<?php

namespace App\Http\Controllers\Customer;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\kendaraan;
use App\Models\customer;
use App\Models\transaksi;
use App\Models\harga_paket;
use App\Models\harga_detailing;
use App\Models\pesanan_paket;
use App\Models\pesanan_detailing;

class bookingController extends Controller
{
    public function index()
    {
        $kendaraans = kendaraan::all();
        return view('customer.booking',compact('kendaraans'));
    }
    public function kirimpesanan(Request $request)
    {
        $customer = customer::where('no_wa',$request->no_hp_customer)->first();
        if($customer == null){
            $customer = customer::create([
                'nama'=>$request->nama_customer,
                'no_wa'=>$request->no_hp_customer,
                'alamat'=>$request->alamat_customer
            ]);
        }

        $kendaraan = kendaraan::find($request->jenis_mobil_customer);

        $transaksi = transaksi::create([
            'plat_nomor'=>$request->plat_nomor_customer,
            'kendaraan_id'=>$request->jenis_mobil_customer,
            'customer_id'=>$customer->id,
        ]);
        
        $total = 0;
        if($request->paket_cuci_customer != "undefined"){
            $paket = harga_paket::where("paket_cuci_id",$request->paket_cuci_customer)
            ->where('jenis_kendaraan',$kendaraan->jenis_kendaraan)->first();
            $total = $total+$paket->harga_paket;
            pesanan_paket::create([
                "transaksi_id"=>$transaksi->id,
                "paket_cuci_id"=>$request->paket_cuci_customer,
            ]);
        }

        if($request->paket_detailing_customer != null){
            foreach($request->paket_detailing_customer as $detail){
                $paket = harga_detailing::where("paket_detailing_id",$detail)
                ->where('jenis_kendaraan',$kendaraan->jenis_kendaraan)->first();
                $total = $total+$paket->harga_detailing;
                pesanan_detailing::create([
                    "transaksi_id"=>$transaksi->id,
                    "paket_detailing_id"=>$detail
                ]);
            }
        }

        $transaksi->update([
            "total"=>$total,
            "status"=>"pemesanan"
        ]);

        return redirect('/')->with("sukses","Berhasil Melakukan Pesanan");
    }
}
