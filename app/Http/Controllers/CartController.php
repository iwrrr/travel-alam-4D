<?php

namespace App\Http\Controllers;

use App\Models\Tool;
use Illuminate\Http\Request;

use Session;

class CartController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $items = \Cart::getContent();
        $this->data['items'] = $items;

        // dd($items);

        return view('travel-alam.keranjang.index', $this->data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $params = $request->except('_token');

        $tool = Tool::findOrFail($params['tool_id']);

        $item = [
            'id' => $tool->id,
            'name' => $tool->alat,
            'price' => $tool->harga,
            'quantity' => $params['qty'],
            'associatedModel' => $tool
        ];

        \Cart::add($item);

        Session::flash('success', 'Berhasil ditambahkan ke keranjang');

        return redirect('peralatan-hiking');
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        \Cart::remove($id);

        return redirect('keranjang');
    }
}
