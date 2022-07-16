<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\transaksi;
use App\Models\pesanan_detailing;
use App\Models\pesanan_paket;
use App\Models\paket_cuci;
use App\Models\paket_detailing;
use Carbon\Carbon;
use DB;
class DashboardController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function index()
    {
        $totalhariini = transaksi::whereDate('created_at', Carbon::today())->count();
        $totalbulanini = transaksi::whereMonth('created_at', Carbon::today()->month)->count();

        $det = pesanan_detailing::select('paket_detailing_id', DB::raw('count(*) as total'))
        ->groupBy('paket_detailing_id')
        ->orderBy('total','DESC')
        ->first();

        $cuci = pesanan_paket::select('paket_cuci_id', DB::raw('count(*) as total'))
        ->groupBy('paket_cuci_id')
        ->orderBy('total','DESC')
        ->first();
        $pl = "-";
        if($det == null && $cuci != null){
            $pl = paket_cuci::find($cuci->paket_cuci_id)->nama_paket;
        }elseif ($cuci == null && $det != null) {
            $pl = paket_detailing::find($det->paket_detailing_id)->nama_detailing;
        }elseif($cuci != null && $det != null){
            $pl = $det->total > $cuci->total ? paket_detailing::find($det->paket_detailing_id)->nama_detailing: paket_cuci::find($cuci->paket_cuci_id)->nama_paket;
        }

        return view("admin.dashboard",compact('totalhariini','totalbulanini','pl'));
    }
}
