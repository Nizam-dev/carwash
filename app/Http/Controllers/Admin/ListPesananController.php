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
        ->get()
        ->sortDesc();
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

        $this->kirimPesan($request->id);
    
        return redirect()->back()->with('sukses-selesai',"Pesanan Telah Selesai");
    }

    

    public function kirimPesan($id)
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
            $pesanan = $pesanan."\n*_WASH_* : \n";
            foreach($transaksi->cuci as $cuci){
                $pesanan = $pesanan."- ".$cuci->nama_paket."\n";
            }
        }
        
        if(!$transaksi->detailing->isEmpty()){
            $pesanan = $pesanan."\n*_Detailing_* : \n";
            foreach($transaksi->detailing as $detailing){
                $pesanan = $pesanan."- ".$detailing->nama_detailing."\n";
            }
        }
            

        $message = "*M2 AUTOCARE - BANYUWANGI*"
        ."\n*_CAR WASH-DETAILING_*"
        ."\n\nHallo : ".$transaksi->nama
        ."\nKendaraan Anda : ".$transaksi->nama_kendaraan
        ."\nPlat Nomor : ".$transaksi->plat_nomor
        ."\n_Dengan Pesanan Berikut :_ \n" 
        .$pesanan
        ."\n_Telah Selesai._"
        ."\n_Terimakasih Atas Kepercayaan Anda Kepada Kami._"
        ;

        try {
            $reqParams = [
            'token' => 'sHU5TstfmEJ1Iah0FMEEwb0KBWXzGrVut53p2cW54/w8eYD1hADu5qi+xpYAj9gO-dian',
            'url' => 'https://api.kirimwa.id/v1/messages',
            'method' => 'POST',
            'payload' => json_encode([
                'message' => $message,
                'phone_number' => $transaksi->no_wa,
                'message_type' => 'text',
                'device_id' => "xiaomi-redmi-nizam"
            ])
            ];
        
            $response = $this->apiKirimWaRequest($reqParams);
        } catch (Exception $e) {
            print_r($e);
        }
    }

    public function tes()
    {
        $this->kirimPesan(1);

    }

    function apiKirimWaRequest(array $params) {
        $httpStreamOptions = [
          'method' => $params['method'] ?? 'GET',
          'header' => [
            'Content-Type: application/json',
            'Authorization: Bearer ' . ($params['token'] ?? '')
          ],
          'timeout' => 15,
          'ignore_errors' => true
        ];
      
        if ($httpStreamOptions['method'] === 'POST') {
          $httpStreamOptions['header'][] = sprintf('Content-Length: %d', strlen($params['payload'] ?? ''));
          $httpStreamOptions['content'] = $params['payload'];
        }
      
        // Join the headers using CRLF
        $httpStreamOptions['header'] = implode("\r\n", $httpStreamOptions['header']) . "\r\n";
      
        $stream = stream_context_create(['http' => $httpStreamOptions]);
        $response = file_get_contents($params['url'], false, $stream);
      
        // Headers response are created magically and injected into
        // variable named $http_response_header
        $httpStatus = $http_response_header[0];
      
        preg_match('#HTTP/[\d\.]+\s(\d{3})#i', $httpStatus, $matches);
      
        if (! isset($matches[1])) {
          throw new Exception('Can not fetch HTTP response header.');
        }
      
        $statusCode = (int)$matches[1];
        if ($statusCode >= 200 && $statusCode < 300) {
          return ['body' => $response, 'statusCode' => $statusCode, 'headers' => $http_response_header];
        }
      
        throw new Exception($response, $statusCode);
      }
}
