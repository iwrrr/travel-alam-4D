<?php

namespace App\Http\Controllers;

use App\Http\Requests\OrderRequest;
use App\Jobs\SendMailOrderReceived;
use App\Models\Payment;
use App\Models\Location;
use App\Models\Order;
use App\Models\OrderItem;
use App\Models\Province;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use RealRashid\SweetAlert\Facades\Alert;

use Cart;
use DateTime;

class OrderController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();

        $this->data['statuses'] = Order::STATUSES;

        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $orders = Order::forUser(Auth::user())->with('orderItems')
            ->orderBy('created_at', 'DESC');

        $q = $request->input('q');
        if ($q) {
            $orders = $orders->where('kode', 'like', '%' . $q . '%')
                ->orWhere('nama_depan', 'like', '%' . $q . '%')
                ->orWhere('nama_belakang', 'like', '%' . $q . '%');
        }

        if ($request->input('status') && in_array($request->input('status'), array_keys(Order::STATUSES))) {
            $orders = $orders->where('status', '=', $request->input('status'));
        }

        $startDate = $request->input('start');
        $endDate = $request->input('end');

        if ($startDate && !$endDate) {
            Session::flash('error', 'The end date is required if the start date is present');
            return redirect('admin/transaksi');
        }

        if (!$startDate && $endDate) {
            Session::flash('error', 'The start date is required if the end date is present');
            return redirect('admin/transaksi');
        }

        if ($startDate && $endDate) {
            if (strtotime($endDate) < strtotime($startDate)) {
                Session::flash('error', 'The end date should be greater or equal than start date');
                return redirect('admin/transaksi');
            }

            $order = $orders->whereRaw("DATE(tanggal_pemesanan) >= ?", $startDate)
                ->whereRaw("DATE(tanggal_pemesanan) <= ? ", $endDate);
        }

        $this->data['orders'] = $orders->paginate(5);

        // dd($orders);

        return view('travel-alam.profil.riwayat', $this->data);
    }

    /**
     * Display the specified resource.
     *
     * @param int $id order ID
     *
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $order = Order::forUser(Auth::user())->with('orderItems')->findOrFail($id);
        $this->data['order'] = $order;

        return view('travel-alam.profil.modal-detail', $this->data);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function checkout()
    {
        $userId = Auth::user()->id;

        if (Cart::session($userId)->isEmpty()) {
            return redirect('keranjang');
        }

        $provinces = Province::all();

        $items = Cart::session($userId)->getContent();

        $this->data['items'] = $items;
        $this->data['provinces'] = $provinces;
        $this->data['user'] = Auth::user();

        return view('travel-alam.order.checkout', $this->data);
    }

    public function fetch(Request $request)
    {
        $data = Location::select('nama_lokasi', 'id')->where('id_provinsi', $request->id)->get();

        return response()->json($data);
    }

    /**
     * Checkout process and saving order data
     *
     * @param OrderRequest $request order data
     * @return void
     */
    public function doCheckout(OrderRequest $request)
    {
        $params = $request->except('_token');

        $order = DB::transaction(function () use ($params) {
            $order = $this->_saveOrder($params);

            $this->_saveOrderItems($order);
            $this->_generatePaymentToken($order);

            return $order;
        });

        if ($order) {
            $userId = Auth::user()->id;

            Cart::session($userId)->clear();

            $this->_sendEmailOrderReceived($order);

            Alert::success('Terima kasih!', 'Pesanan telah diterima!');
            return redirect('pesanan/diterima/' . $order->id);
        }

        return redirect('pesanan/checkout');
    }

    private function _generatePaymentToken($order)
    {
        $this->initPaymentGateway();

        $customerDetails = [
            'first_name' => $order->nama_depan,
            'last_name' => $order->nama_belakang,
            'email' => $order->email_pelanggan,
            'phone' => $order->no_telepon
        ];

        $params = [
            'enabled_payments' => Payment::PAYMENT_CHANNELS,
            'transaction_details' => [
                'order_id' => $order->kode,
                'gross_amount' => $order->total
            ],
            'customer_details' => $customerDetails,
            'expiry' => [
                'start_time' => date('Y-m-d H:i:s T'),
                'unit' => Payment::EXPIRY_UNIT,
                'duration' => Payment::EXPIRY_DURATION
            ]
        ];

        $snap = \Midtrans\Snap::createTransaction($params);

        if ($snap->token) {
            $order->token_pembayaran = $snap->token;
            $order->url_pembayaran = $snap->redirect_url;
            $order->save();
        }
    }

    private function _saveOrder($params)
    {
        $userId = Auth::user()->id;
        $duration = $params['hari'];
        $subTotal = Cart::session($userId)->getSubTotal();
        $cartItems = Cart::session($userId)->getContent();

        if ($params && $cartItems) {
            foreach ($cartItems as $item) {
                if ($item->quantity > 2) {
                    $subTotal -= 5000;
                }

                $orderItemParams = [
                    'id_peralatan' => $item->associatedModel->id,
                    'nama_peralatan' => $item->name,
                    'harga_peralatan' => $item->price,
                    'jumlah' => $item->quantity,
                    'subtotal' => $subTotal,
                ];
            }
        }

        if ($duration > 2) {
            $total = $subTotal * $duration - 5000;
        } else {
            $total = $subTotal * $duration;
        }

        $orderDate = date('Y-m-d H:i');
        $paymentDue = (new DateTime($orderDate))->modify('+1 day')->format('Y-m-d H:i:s');

        $orderParams = [
            'id_pengguna' => Auth::user()->id,
            'nama_depan' => $params['nama_depan'],
            'nama_belakang' => $params['nama_belakang'],
            'email_pelanggan' => $params['email_pelanggan'],
            'no_telepon' => $params['no_telepon'],
            'kode' => Order::generateCode(),
            'status' => Order::CREATED,
            'tanggal_pemesanan' => $orderDate,
            'batas_pembayaran' => $paymentDue,
            'status_pembayaran' => Order::UNPAID,
            'provinsi' => $params['provinsi'],
            'lokasi' => $params['lokasi'],
            'tanggal' => $params['tanggal'],
            'hari' => $duration,
            'subtotal' => $subTotal,
            'total' => $total
        ];

        return Order::create($orderParams);
    }

    private function _saveOrderItems($order)
    {
        $userId = Auth::user()->id;

        $cartItems = Cart::session($userId)->getContent();

        if ($order && $cartItems) {
            foreach ($cartItems as $item) {
                if ($item->quantity > 3) {
                    $itemTotal = $item->quantity * $item->price - 5000;
                } else {
                    $itemTotal = $item->quantity * $item->price;
                }

                $orderItemParams = [
                    'id_pesanan' => $order->id,
                    'id_peralatan' => $item->associatedModel->id,
                    'nama_peralatan' => $item->name,
                    'harga_peralatan' => $item->price,
                    'jumlah' => $item->quantity,
                    'subtotal' => $itemTotal,
                ];

                OrderItem::create($orderItemParams);
            }
        }
    }

    private function _sendEmailOrderReceived($order)
    {
        SendMailOrderReceived::dispatch($order, Auth::user())->delay(now()->addMinutes(1));
    }

    /**
     * Show the received page for success checkout
     *
     * @param int $orderId order id
     *
     * @return void
     */
    public function received($orderId)
    {
        $this->data['order'] = Order::where('id', $orderId)->where('id_pengguna', Auth::user()->id)->firstOrFail();

        return view('travel-alam.order.received', $this->data);
    }
}
