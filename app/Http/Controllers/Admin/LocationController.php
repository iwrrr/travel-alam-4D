<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\LocationImageRequest;
use App\Http\Requests\LocationRequest;
use App\Models\Location;
use App\Models\LocationImage;
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

        $this->data['types'] = Location::types();
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
        $provinces = Province::pluck('provinsi', 'id');
        $tours = Tour::pluck('wisata', 'id');

        $this->data['locations'] = $locations;
        $this->data['locationID'] = 0;
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
        $params['slug'] = Str::slug($params['lokasi']);

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
        $location = Location::findOrFail($id);
        $provinces = Province::pluck('provinsi', 'id');
        $tours = Tour::pluck('wisata', 'id');

        $this->data['location'] = $location;
        $this->data['locationID'] = $location->id;
        $this->data['provinces'] = $provinces;
        $this->data['tours'] = $tours;

        return view('admin.destinasi.lokasi.form', $this->data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(LocationRequest $request, $id)
    {
        $params = $request->except('_token');
        $params['slug'] = Str::slug($params['lokasi']);

        $location = Location::findOrFail($id);

        if ($location->update($params)) {
            Session::flash('success', 'Lokasi telah diperbaharui.');
        }

        return redirect('admin/destinasi/lokasi');
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

    public function images($id)
    {
        $location = Location::findOrFail($id);

        $this->data['locationID'] = $location->id;
        $this->data['locationImages'] = $location->locationImages;

        return view('admin.destinasi.lokasi.images', $this->data);
    }

    public function add_image($id)
    {

        $location = Location::findOrFail($id);

        $this->data['locationID'] = $location->id;
        $this->data['location'] = $location;

        return view('admin.destinasi.lokasi.image_form', $this->data);
    }

    public function upload_image(LocationImageRequest $request, $id)
    {
        $location = Location::findOrFail($id);

        if ($request->has('image')) {
            $image = $request->file('image');
            $name = $location->slug . '_' . time();
            $fileName = $name . '.' . $image->getClientOriginalExtension();

            $folder = '/uploads/locations/images';
            $filePath = $image->storeAs($folder, $fileName, 'public');

            $params = [
                'location_id' => $location->id,
                'path' => $filePath,
            ];

            if (LocationImage::create($params)) {
                Session::flash('success', 'Gambar berhasil diunggah');
            } else {
                Session::flash('error', 'Gambar gagal diunggah');
            }

            return redirect('admin/destinasi/lokasi/' . $id . '/gambar');
        }
    }

    public function remove_image($id)
    {
        $image = LocationImage::findOrFail($id);

        if ($image->delete()) {
            Session::flash('success', 'Gambar telah dihapus');
        }

        return redirect('admin/destinasi/lokasi/' . $image->location->id . '/gambar');
    }
}
