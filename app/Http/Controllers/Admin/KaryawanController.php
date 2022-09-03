<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\karyawan;
class KaryawanController extends Controller
{

    function index(){
        $karyawans = karyawan::all();
        return view('admin.karyawan',compact('karyawans'));
    }

    function store(Request $request){
        $request->validate([
            'nama_karyawan'=>'required'
        ]);

        if(karyawan::where('nama_karyawan',$request->nama_karyawan)->first() != null){
            return redirect()->back()->with('gagal',"Karyawan sudah ada");
        }

        karyawan::create($request->all());
        return redirect()->back()->with('sukses',"Berhasil Menambah Karyawan");

    }

    function destroy($id){
        karyawan::find($id)->delete();
        return redirect()->back()->with('sukses',"Berhasil Menghapus Karyawan");
    }
    
}
