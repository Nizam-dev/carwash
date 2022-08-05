<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\transaksi;
use App\Models\paket_cuci;
use App\Models\paket_detailing;
use DB;
use PDF;

class LaporanController extends Controller
{
    public function index()
    {

        $laporan_paket = paket_cuci::join("pesanan_pakets","pesanan_pakets.paket_cuci_id","paket_cucis.id")
        ->select(
            DB::raw('sum(pesanan_pakets.harga) as total_pendapatan'), 
            DB::raw('count(pesanan_pakets.harga) as total_pesanan'), 
            DB::raw("DATE_FORMAT(pesanan_pakets.created_at,'%M %Y') as bulan"),
            "paket_cucis.nama_paket"
            )
        ->groupBy('nama_paket')
        ->groupBy('bulan')
        ->get();
        
        $laporan_detailing = paket_detailing::join("pesanan_detailings","pesanan_detailings.paket_detailing_id","paket_detailings.id")
        ->select(
            DB::raw('sum(pesanan_detailings.harga) as total_pendapatan'), 
            DB::raw('count(pesanan_detailings.harga) as total_pesanan'), 
            DB::raw("DATE_FORMAT(pesanan_detailings.created_at,'%M %Y') as bulan"),
            "paket_detailings.nama_detailing as nama_paket"
            )
        ->groupBy('nama_paket')
        ->groupBy('bulan')
        ->get();

        $transaksis = transaksi::join('customers','customers.id','transaksis.customer_id')
        ->join('kendaraans','kendaraans.id','transaksis.kendaraan_id')
        ->where('transaksis.status','selesai')
        ->select('transaksis.*','customers.nama','kendaraans.nama_kendaraan')
        ->with(['detailing','cuci'])
        ->get();

        return view('admin.laporan',compact('laporan_paket','laporan_detailing','transaksis'));
    }

    public function laporanpdf(Request $request)
    {
        $laporan_paket = paket_cuci::join("pesanan_pakets","pesanan_pakets.paket_cuci_id","paket_cucis.id")
        ->whereMonth('pesanan_pakets.created_at', $request->bulan)
        ->whereYear('pesanan_pakets.created_at', $request->tahun)
        ->select(
            DB::raw('sum(pesanan_pakets.harga) as total_pendapatan'), 
            DB::raw('count(pesanan_pakets.harga) as total_pesanan'), 
            DB::raw("DATE_FORMAT(pesanan_pakets.created_at,'%M %Y') as bulan"),
            "paket_cucis.nama_paket"
            )
        ->groupBy('nama_paket')
        ->groupBy('bulan')
        ->get();

        $laporan_detailing = paket_detailing::join("pesanan_detailings","pesanan_detailings.paket_detailing_id","paket_detailings.id")
        ->whereMonth('paket_detailings.created_at', $request->bulan)
        ->whereYear('paket_detailings.created_at', $request->tahun)
        ->select(
            DB::raw('sum(pesanan_detailings.harga) as total_pendapatan'), 
            DB::raw('count(pesanan_detailings.harga) as total_pesanan'), 
            DB::raw("DATE_FORMAT(pesanan_detailings.created_at,'%M %Y') as bulan"),
            "paket_detailings.nama_detailing as nama_paket"
            )
        ->groupBy('nama_paket')
        ->groupBy('bulan')
        ->get();

        // return view('admin.laporan_pdf',compact('laporan_paket','laporan_detailing'));
        $pdf = PDF::loadview('admin.laporan_pdf',compact('laporan_paket','laporan_detailing'));
    	return $pdf->download('laporan-bulanan-pdf.pdf');
    }

    public function laporantransaksipdf(Request $request)
    {
        $transaksis = transaksi::join('customers','customers.id','transaksis.customer_id')
        ->join('kendaraans','kendaraans.id','transaksis.kendaraan_id')
        ->where('transaksis.status','selesai')
        ->whereMonth('transaksis.created_at', $request->bulan)
        ->whereYear('transaksis.created_at', $request->tahun)
        ->select('transaksis.*','customers.nama','kendaraans.nama_kendaraan')
        ->with(['detailing','cuci'])
        ->get();
        $pdf = PDF::loadview('admin.laporan_transaksi_pdf',compact('transaksis'));
    	return $pdf->download('laporan-transaksi-bulanan-pdf.pdf');
    }
}
