<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\transaksi;

class ListPesananController extends Controller
{
    public function index()
    {
        $pesanans = transaksi::where('transaksis.status','pemesanan')
        ->join('customers','customers.id','transaksis.customer_id')
        ->join('kendaraans','kendaraans.id','transaksis.kendaraan_id')
        ->select('transaksis.*','customers.nama','kendaraans.nama_kendaraan')
        ->with(['detailing','cuci'])
        ->get();
        return view('admin.listpesanan',compact('pesanans'));
    }
}
