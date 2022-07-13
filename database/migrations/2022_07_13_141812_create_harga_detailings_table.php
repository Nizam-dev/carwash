<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use App\Models\paket_detailing;
use App\Models\harga_detailing;

class CreateHargaDetailingsTable extends Migration
{
    public function up()
    {
        Schema::create('harga_detailings', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('harga_detailing');
            $table->string('lama_pengerjaan')->nullable();
            $table->string('jenis_kendaraan');
            $table->foreignId('paket_detailing_id')->constrained();
            $table->timestamps();
        });

        // Insert
        $jenis_mobils = [
            ["jenis"=>"A","harga"=>"250000","paket"=>"Engine"],
            ["jenis"=>"B","harga"=>"200000","paket"=>"Engine"],
            ["jenis"=>"Extra","harga"=>"300000","paket"=>"Engine"],

            ["jenis"=>"A","harga"=>"250000","paket"=>"Windows"],
            ["jenis"=>"B","harga"=>"200000","paket"=>"Windows"],
            ["jenis"=>"Extra","harga"=>"300000","paket"=>"Windows"],

            ["jenis"=>"A","harga"=>"500000","paket"=>"Exterior"],
            ["jenis"=>"B","harga"=>"600000","paket"=>"Exterior"],
            ["jenis"=>"Extra","harga"=>"750000","paket"=>"Exterior"],

            ["jenis"=>"A","harga"=>"600000","paket"=>"Interior"],
            ["jenis"=>"B","harga"=>"700000","paket"=>"Interior"],
            ["jenis"=>"Extra","harga"=>"850000","paket"=>"Interior"],

            ["jenis"=>"A","harga"=>"1200000","paket"=>"Full Detailing"],
            ["jenis"=>"B","harga"=>"1300000","paket"=>"Full Detailing"],
            ["jenis"=>"Extra","harga"=>"1500000","paket"=>"Full Detailing"],

            ["jenis"=>"A","harga"=>"1300000","paket"=>"Semi Coating"],
            ["jenis"=>"B","harga"=>"1400000","paket"=>"Semi Coating"],
            ["jenis"=>"Extra","harga"=>"2000000","paket"=>"Semi Coating"],

            ["jenis"=>"A","harga"=>"3400000","paket"=>"Coating"],
            ["jenis"=>"B","harga"=>"3800000","paket"=>"Coating"],
            ["jenis"=>"Extra","harga"=>"4750000","paket"=>"Coating"],

            ["jenis"=>"A","harga"=>"300000","paket"=>"Maintenance Coating"],
            ["jenis"=>"B","harga"=>"400000","paket"=>"Maintenance Coating"],
            ["jenis"=>"Extra","harga"=>"600000","paket"=>"Maintenance Coating"],

            ["jenis"=>"A","harga"=>"250000","paket"=>"Head Lamp"],
            ["jenis"=>"B","harga"=>"250000","paket"=>"Head Lamp"],
            ["jenis"=>"Extra","harga"=>"250000","paket"=>"Head Lamp"],

        ];
        foreach($jenis_mobils as $jenis){
            $paket = paket_detailing::where('nama_detailing',$jenis['paket'])->first();
            harga_detailing::create([
                "harga_detailing"=>$jenis['harga'],
                "jenis_kendaraan"=>$jenis['jenis'],
                "paket_detailing_id"=>$paket->id,
            ]);
        }
 
    }


    
    public function down()
    {
        Schema::dropIfExists('harga_detailings');
    }
}
