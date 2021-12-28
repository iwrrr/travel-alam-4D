<?php

namespace App\Http\Controllers;

use App\Models\Location;
use Illuminate\Http\Request;

class DestinationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $locations = Location::with('province')->get();

        $this->data['locations'] = $locations;

        return view('travel-alam.destinasi.index', $this->data);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($slug)
    {
        $location = Location::where('slug', $slug)->first();

        if (!$location) {
            return redirect('destinasi');
        }

        $this->data['location'] = $location;

        return view('travel-alam.destinasi.detail', $this->data);
    }
}
