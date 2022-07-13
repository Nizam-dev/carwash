<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\paket_detailing;

class DetailingController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $detailings = paket_detailing::with('harga')->get();
        return view("admin.detailing",compact('detailings'));
    }
}
