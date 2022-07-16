<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\paket_cuci;
use App\Models\harga_paket;

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

    public function store(Request $request)
    {
        harga_paket::where('paket_cuci_id',$request->id)
        ->where('jenis_kendaraan','A')
        ->update([
            'harga_paket'=>$request->a
        ]);
        harga_paket::where('paket_cuci_id',$request->id)
        ->where('jenis_kendaraan','B')
        ->update([
            'harga_paket'=>$request->b
        ]);
        harga_paket::where('paket_cuci_id',$request->id)
        ->where('jenis_kendaraan','Extra')
        ->update([
            'harga_paket'=>$request->extra
        ]);
        return redirect()->back()->with('sukses','Harga Berhasil diupdate');
    }
}
