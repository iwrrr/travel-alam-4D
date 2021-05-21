<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\TourRequest;
use App\Models\Tour;
use Illuminate\Http\Request;

use Str;
use Session;

class TourController extends Controller
{

    public function __construct()
    {
        parent::__construct();

        $this->data['currentAdminMenu'] = 'destinasi';
        $this->data['currentAdminSubMenu'] = 'wisata';
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $this->data['tours'] = Tour::orderBy('wisata', 'ASC')->paginate(10);

        return view('admin.destinasi.wisata.index', $this->data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $tours = Tour::orderBy('wisata', 'ASC')->get();

        $this->data['tours'] = $tours->toArray();
        $this->data['tour'] = null;

        return view('admin.destinasi.wisata.form', $this->data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(TourRequest $request)
    {
        $params = $request->except('_token');
        $params['slug'] = Str::slug($params['wisata']);

        if (Tour::create($params)) {
            Session::flash('success', 'Wisata telah ditambahkan');
        }

        return redirect('admin/destinasi/wisata');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $tour = Tour::findOrFail($id);

        $this->data['tour'] = $tour;

        return view('admin.destinasi.wisata.form', $this->data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(TourRequest $request, $id)
    {
        $params = $request->except('_token');
        $params['slug'] = Str::slug($params['wisata']);

        $tour = Tour::findOrFail($id);

        if ($tour->update($params)) {
            Session::flash('success', 'Wisata telah diperbaharui.');
        }

        return redirect('admin/destinasi/wisata');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $tour = Tour::findOrFail($id);

        if ($tour->delete()) {
            Session::flash('success', 'Wisata berhasil dihapus');
        }

        return redirect('admin/destinasi/wisata');
    }
}
