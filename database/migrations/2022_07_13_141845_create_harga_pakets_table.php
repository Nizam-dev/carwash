<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use App\Models\paket_cuci;
use App\Models\harga_paket;

class CreateHargaPaketsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('harga_pakets', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('harga_paket');
            $table->string('lama_pengerjaan')->nullable();
            $table->string('jenis_kendaraan');
            $table->foreignId('paket_cuci_id')->constrained();
            $table->timestamps();
        });

               // Insert
               $jenis_mobils = [
                ["jenis"=>"A","harga"=>"45000","paket"=>"Quick Wash"],
                ["jenis"=>"B","harga"=>"50000","paket"=>"Quick Wash"],
                ["jenis"=>"Extra","harga"=>"75000","paket"=>"Quick Wash"],
    
                ["jenis"=>"A","harga"=>"55000","paket"=>"Ultimate Quick Wash"],
                ["jenis"=>"B","harga"=>"60000","paket"=>"Ultimate Quick Wash"],
                ["jenis"=>"Extra","harga"=>"85000","paket"=>"Ultimate Quick Wash"],
    
                ["jenis"=>"A","harga"=>"110000","paket"=>"Wax Wash"],
                ["jenis"=>"B","harga"=>"130000","paket"=>"Wax Wash"],
                ["jenis"=>"Extra","harga"=>"150000","paket"=>"Wax Wash"],
    
                ["jenis"=>"A","harga"=>"120000","paket"=>"Ultimate Wax Wash"],
                ["jenis"=>"B","harga"=>"140000","paket"=>"Ultimate Wax Wash"],
                ["jenis"=>"Extra","harga"=>"170000","paket"=>"Ultimate Wax Wash"],
    
                ["jenis"=>"A","harga"=>"175000","paket"=>"Nano Wash"],
                ["jenis"=>"B","harga"=>"200000","paket"=>"Nano Wash"],
                ["jenis"=>"Extra","harga"=>"260000","paket"=>"Nano Wash"],
    
                ["jenis"=>"A","harga"=>"185000","paket"=>"Ultimate Nano Wash"],
                ["jenis"=>"B","harga"=>"210000","paket"=>"Ultimate Nano Wash"],
                ["jenis"=>"Extra","harga"=>"280000","paket"=>"Ultimate Nano Wash"],
    
                
    
            ];
            foreach($jenis_mobils as $jenis){
                $paket = paket_cuci::where('nama_paket',$jenis['paket'])->first();
                harga_paket::create([
                    "harga_paket"=>$jenis['harga'],
                    "jenis_kendaraan"=>$jenis['jenis'],
                    "paket_cuci_id"=>$paket->id,
                ]);
            }
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('harga_pakets');
    }
}
