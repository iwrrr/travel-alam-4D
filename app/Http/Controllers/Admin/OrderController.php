<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\OrderItem;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

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

        $this->data['currentAdminMenu'] = 'transaksi';
        $this->data['currentAdminSubMenu'] = 'pesanan';
        $this->data['statuses'] = Order::STATUSES;

        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @param Request $request request params
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $orders = Order::orderBy('created_at', 'DESC');

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

        return view('admin.transaksi.index', $this->data);
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
        $order = Order::withTrashed()->findOrFail($id);

        $this->data['order'] = $order;

        return view('admin.transaksi.show', $this->data);
    }

    /**
     * Display cancel order form
     *
     * @param int $id order ID
     *
     * @return \Illuminate\Http\Response
     */
    public function cancel($id)
    {
        $order = Order::where('id', $id)
            ->whereIn('status', [Order::CREATED, Order::CONFIRMED])
            ->firstOrFail();

        $this->data['order'] = $order;

        return view('admin.transaksi.cancel', $this->data);
    }

    /**
     * Doing the cancel process
     *
     * @param Request $request request params
     * @param int     $id      order ID
     *
     * @return \Illuminate\Http\Response
     */
    public function doCancel(Request $request, $id)
    {
        $request->validate(
            [
                'pesan_dibatalkan' => 'required|max:255',
            ]
        );

        $order = Order::findOrFail($id);

        $cancelOrder = DB::transaction(
            function () use ($order, $request) {
                $params = [
                    'status' => Order::CANCELLED,
                    'dibatalkan_oleh' => Auth::user()->id,
                    'dibatalkan_pada' => now(),
                    'pesan_dibatalkan' => $request->input('pesan_dibatalkan'),
                ];

                $cancelOrder = $order->update($params);

                return $cancelOrder;
            }
        );

        Session::flash('success', 'The order has been cancelled');

        return redirect('admin/transaksi');
    }

    /**
     * Marking order as completed
     *
     * @param Request $request request params
     * @param int     $id      order ID
     *
     * @return \Illuminate\Http\Response
     */
    public function doComplete($id)
    {
        $order = Order::findOrFail($id);

        $order->status = Order::COMPLETED;
        $order->diterima_oleh = Auth::user()->id;
        $order->diterima_pada = now();

        if ($order->save()) {
            Session::flash('success', 'Pesanan telah selesai!');
            return redirect('admin/transaksi');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id order ID
     *
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $order = Order::withTrashed()->findOrFail($id);

        if ($order->trashed()) {
            $canDestroy = DB::transaction(
                function () use ($order) {
                    OrderItem::where('order_id', $order->id)->delete();
                    $order->forceDelete();

                    return true;
                }
            );

            if ($canDestroy) {
                Session::flash('success', 'The order has been removed permanently');
            } else {
                Session::flash('success', 'The order could not be removed permanently');
            }

            return redirect('admin/transaksi/dihapus');
        } else {
            $canDestroy = DB::transaction(
                function () use ($order) {
                    $order->delete();

                    return true;
                }
            );

            if ($canDestroy) {
                Session::flash('success', 'The order has been removed');
            } else {
                Session::flash('success', 'The order could not be removed');
            }

            return redirect('admin/transaksi');
        }
    }

    /**
     * Restoring the soft deleted order
     *
     * @param int $id order ID
     *
     * @return \Illuminate\Http\Response
     */
    public function restore($id)
    {
        $order = Order::onlyTrashed()->findOrFail($id);

        $canRestore = DB::transaction(
            function () use ($order) {
                return $order->restore();
            }
        );

        if ($canRestore) {
            Session::flash('success', 'The order has been restored');
            return redirect('admin/transaksi');
        } else {
            if (!Session::has('error')) {
                Session::flash('error', 'The order could not be restored');
            }
            return redirect('admin/transaksi/dihapus');
        }
    }
}
