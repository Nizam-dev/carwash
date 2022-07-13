<?php

namespace App\Http\Controllers\Customer;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\kendaraan;

class bookingController extends Controller
{
    public function index()
    {
        $kendaraans = kendaraan::all();
        return view('customer.booking',compact('kendaraans'));
    }
}
