<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\transaksi;
use Illuminate\Support\Str;

class ListPesananController extends Controller
{
    public function index()
    {
        $pesanans = transaksi::join('customers','customers.id','transaksis.customer_id')
        ->join('kendaraans','kendaraans.id','transaksis.kendaraan_id')
        ->select('transaksis.*','customers.nama','kendaraans.nama_kendaraan')
        ->with(['detailing','cuci'])
        ->get();
        return view('admin.listpesanan',compact('pesanans'));
    }


    public function verifikasipesanan(Request $request)
    {
        $transaksi = "M2C".Str::random(6);

        transaksi::find($request->id)->update([
            "nama_pegawai"=>$request->nama_pegawai,
            "status"=>"proses",
            "kode_transaksi"=>$transaksi
        ]);
       
        // dd($this->kirimPesan($request->id,"Sudah Diverifikasi dengan kode transaksi ".$transaksi
        // ."\nSilahkan datang dengan menunjukan kode transaksi agar kendaraanmu cepat ditangani."));
    
        return redirect()->back()->with('sukses',"Pesanan Berhasil Diverifikasi");
    }

    public function verifikasipesananselesai(Request $request)
    {
        transaksi::find($request->id)->update([
            "status"=>"selesai",
        ]);
    
        return redirect()->back()->with('sukses-selesai',"Pesanan Telah Selesai");
    }

    

    public function kirimPesan($id,$pesan)
    {
        $transaksi = transaksi::where("transaksis.id",$id)
        ->join("customers","customers.id","transaksis.customer_id")
        ->join("kendaraans","kendaraans.id","transaksis.kendaraan_id")
        ->select("customers.nama","customers.no_wa","customers.alamat","transaksis.*","kendaraans.nama_kendaraan")
        ->with("cuci")
        ->with("detailing")
        ->first();
        $pesanan="";
        if(!$transaksi->cuci->isEmpty()){
            foreach($transaksi->cuci as $cuci){
                $pesanan = $pesanan."- ".$cuci->nama_paket."\n";
            }
        }
        
        if(!$transaksi->detailing->isEmpty()){
            foreach($transaksi->detailing as $detailing){
                $pesanan = $pesanan."- ".$detailing->nama_detailing."\n";
            }
        }
            

        $message = "Hallo, ".$transaksi->nama
        ."\nKendaraan Anda : ".$transaksi->nama_kendaraan
        ."\nPlat Nomor : ".$transaksi->plat_nomor
        ."\nDengan Pesanan : \n" 
        .$pesanan
        .$pesan
        ;
        return $message;
    }
}
