<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\transaksi;

class LaporanKendaraanController extends Controller
{
    function index(){
        $laporan_kendaraans = transaksi::join('kendaraans','kendaraans.id','transaksis.kendaraan_id')
        ->select('kendaraans.nama_kendaraan','transaksis.plat_nomor',\DB::raw('count(transaksis.id) as total'))
        ->groupBy('plat_nomor','nama_kendaraan')
        ->get();
        return view('admin.laporan_kendaraan',compact('laporan_kendaraans'));
    }
}
