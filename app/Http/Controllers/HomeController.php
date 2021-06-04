<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Cart;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    public function index()
    {
        if (Auth::check()) {
            $userId = Auth::user()->id;

            Cart::session($userId)->clear();
        }

        return view('travel-alam.index');
    }
}
