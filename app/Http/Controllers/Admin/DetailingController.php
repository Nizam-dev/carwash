<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\paket_detailing;
use App\Models\harga_detailing;

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

    public function store(Request $request)
    {
        harga_detailing::where('paket_detailing_id',$request->id)
        ->where('jenis_kendaraan','A')
        ->update([
            'harga_detailing'=>$request->a
        ]);
        harga_detailing::where('paket_detailing_id',$request->id)
        ->where('jenis_kendaraan','B')
        ->update([
            'harga_detailing'=>$request->b
        ]);
        harga_detailing::where('paket_detailing_id',$request->id)
        ->where('jenis_kendaraan','Extra')
        ->update([
            'harga_detailing'=>$request->extra
        ]);
        return redirect()->back()->with('sukses','Harga Berhasil diupdate');
    }
}
