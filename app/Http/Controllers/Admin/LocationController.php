<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\LocationRequest;
use App\Models\Location;
use App\Models\Province;
use App\Models\Tour;
use Illuminate\Http\Request;

use Str;
use Session;

class LocationController extends Controller
{

    public function __construct()
    {
        parent::__construct();

        $this->data['currentAdminMenu'] = 'destinasi';
        $this->data['currentAdminSubMenu'] = 'lokasi';
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $locations = Location::with('tour', 'province')->paginate(2);

        $this->data['locations'] = $locations;

        // dd($this->data);

        return view('admin.destinasi.lokasi.index', $this->data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $locations = Location::all();
        $provinces = Province::pluck('name', 'id');
        $tours = Tour::pluck('name', 'id');

        $this->data['locations'] = $locations;
        $this->data['provinces'] = $provinces;
        $this->data['tours'] = $tours;

        // dd($this->data);

        return view('admin.destinasi.lokasi.form', $this->data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(LocationRequest $request)
    {
        $params = $request->except('_token');
        $params['slug'] = Str::slug($params['name']);

        if (Location::create($params)) {
            Session::flash('success', 'Lokasi telah ditambahkan');
        }

        return redirect('admin/destinasi/lokasi');
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
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
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
        $location = Location::findOrFail($id);

        if ($location->delete()) {
            Session::flash('success', 'Lokasi berhasil dihapus');
        }

        return redirect('admin/destinasi/lokasi');
    }
}
