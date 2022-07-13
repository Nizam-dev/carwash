<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\paket_cuci;

class PaketController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $pakets = paket_cuci::with('harga')->get();
        return view("admin.paket",compact('pakets'));
    }
}
