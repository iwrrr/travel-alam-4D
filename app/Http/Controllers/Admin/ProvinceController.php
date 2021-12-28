<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\ProvinceRequest;
use App\Models\Province;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Str;
use Session;

class ProvinceController extends Controller
{

    public function __construct()
    {
        parent::__construct();

        $this->data['currentAdminMenu'] = 'destinasi';
        $this->data['currentAdminSubMenu'] = 'provinsi';

        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $this->data['provinces'] = Province::orderBy('nama_provinsi', 'ASC')->paginate(10);

        return view('admin.destinasi.provinsi.index', $this->data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $provinces = Province::orderBy('nama_provinsi', 'ASC')->get();

        $this->data['provinces'] = $provinces->toArray();
        $this->data['province'] = null;

        return view('admin.destinasi.provinsi.form', $this->data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ProvinceRequest $request)
    {
        $params = $request->except('_token');
        $params['slug'] = Str::slug($params['nama_provinsi']);

        if (Province::create($params)) {
            Session::flash('success', 'Provinsi telah ditambahkan');
        }

        return redirect('admin/destinasi/provinsi');
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
        $province = Province::findOrFail($id);

        $this->data['province'] = $province;

        return view('admin.destinasi.provinsi.form', $this->data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(ProvinceRequest $request, $id)
    {
        $params = $request->except('_token');
        $params['slug'] = Str::slug($params['nama_provinsi']);

        $province = Province::findOrFail($id);

        if ($province->update($params)) {
            Session::flash('success', 'Provinsi telah diperbaharui.');
        }

        return redirect('admin/destinasi/provinsi');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $province = Province::findOrFail($id);

        if ($province->delete()) {
            Session::flash('success', 'Provinsi berhasil dihapus');
        }

        return redirect('admin/destinasi/provinsi');
    }
}
