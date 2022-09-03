<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Carbon\Carbon;
use App\Models\transaksi;

class LaporanKaryawanController extends Controller
{
    function index(Request $request){
        $laporan_karyawans = transaksi::whereMonth('created_at', Carbon::today()->month) 
        ->select('nama_pegawai',\DB::raw('count(*) as total'))
        ->groupBy('nama_pegawai')
        ->get();
        $bulan = Carbon::today()->month;
        $tahun = Carbon::today()->year;
        if($request->has('bulan')){
            $laporan_karyawans = transaksi::whereMonth('created_at', $request->bulan) 
            ->whereYear('created_at', $request->tahun) 
            ->select('nama_pegawai',\DB::raw('count(*) as total'))
            ->groupBy('nama_pegawai')
            ->get();
            $bulan = $request->bulan;
            $tahun = $request->tahun;
        }

        return view('admin.laporan_karyawan',compact('laporan_karyawans','bulan','tahun'));
    }
}
