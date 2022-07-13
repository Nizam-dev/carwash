<?php

namespace App\Http\Controllers\Customer;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\paket_cuci;
class LandingpageController extends Controller
{
    public function index()
    {
        $pakets = paket_cuci::with('harga')->get();
        return view('landingpage',compact('pakets'));
    }
}
