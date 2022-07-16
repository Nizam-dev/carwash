<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\kendaraan;


class KendaraanController extends Controller
{

    public function index()
    {
        $kendaraans = kendaraan::all();
        return view('admin.kendaraan',compact('kendaraans'));
    }



    public function store(Request $request)
    {
        $cek = kendaraan::where("nama_kendaraan",$request->nama_kendaraan)
        ->where("jenis_kendaraan",$request->jenis_kendaraan)
        ->first();
        if($cek != null){
            return redirect()->back()->with("gagal","Kendaraan Sudah Ada");
        }
        kendaraan::create($request->all());
        return redirect()->back()->with("sukses","Kendaraan Berhasil ditambahkan");
    }

   
}
