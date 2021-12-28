<?php

namespace App\Http\Controllers;

use App\Models\Tool;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use RealRashid\SweetAlert\Facades\Alert;

use Cart;

class CartController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (Auth::check()) {
            $userId = Auth::user()->id;

            $items = Cart::session($userId)->getContent();
            $this->data['items'] = $items;
            $this->data['userId'] = $userId;

            return view('travel-alam.keranjang.index', $this->data);
        }

        Alert::info('Oops!', 'Kamu harus login terlebih dahulu!');

        return redirect('/');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if (Auth::check()) {
            $params = $request->except('_token');
            $userId = Auth::user()->id;

            $tool = Tool::findOrFail($params['id_peralatan']);

            $item = [
                'id' => $tool->id,
                'name' => $tool->nama_peralatan,
                'price' => $tool->harga_peralatan,
                'quantity' => $params['jumlah'],
                'associatedModel' => $tool
            ];

            Cart::session($userId)->add($item);

            Alert::success('Yay!', 'Berhasil ditambahkan ke keranjang!');

            return redirect('peralatan');
        }

        Alert::info('Oops!', 'Kamu harus login terlebih dahulu!');

        return redirect('/');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        if (Auth::check()) {
            $params = $request->except('_token');
            $userId = Auth::user()->id;

            if ($items = $params['items']) {
                foreach ($items as $cartID => $item) {
                    Cart::session($userId)->update($cartID, [
                        'quantity' => [
                            'relative' => false,
                            'value' => $item['jumlah']
                        ]
                    ]);
                }
                // Session::flash('success', 'Keranjang telah diperbarui');
                Alert::success('Keranjang telah diperbarui!');

                return redirect('keranjang');
            }
        }

        Alert::info('Oops!', 'Kamu harus login terlebih dahulu!');

        return redirect('/');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if (Auth::check()) {
            $userId = Auth::user()->id;

            Cart::session($userId)->remove($id);

            return redirect('keranjang');
        }

        Alert::info('Oops!', 'Kamu harus login terlebih dahulu!');

        return redirect('/');
    }
}
