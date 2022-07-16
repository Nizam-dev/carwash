<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\transaksi;
use DB;
use PDF;

class LaporanController extends Controller
{
    public function index()
    {
        $laporans = transaksi::select(
            DB::raw('sum(total) as total_pendapatan'), 
            DB::raw('count(total) as total_pesanan'), 
            DB::raw("DATE_FORMAT(created_at,'%M %Y') as bulan")
            )
            ->groupBy('bulan')
            ->get();
        return view('admin.laporan',compact('laporans'));
    }

    public function laporanpdf()
    {
        $laporans = transaksi::select(
            DB::raw('sum(total) as total_pendapatan'), 
            DB::raw('count(total) as total_pesanan'), 
            DB::raw("DATE_FORMAT(created_at,'%M %Y') as bulan")
            )
            ->groupBy('bulan')
            ->get();
        $pdf = PDF::loadview('admin.laporan_pdf',compact('laporans'));
    	return $pdf->download('laporan-bulanan-pdf');
    }
}
