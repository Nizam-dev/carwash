<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use App\Models\kendaraan;

class CreateKendaraansTable extends Migration
{

    public function up()
    {
        Schema::create('kendaraans', function (Blueprint $table) {
            $table->id();
            $table->string('nama_kendaraan');
            $table->string('jenis_kendaraan');
            $table->timestamps();
        });

        // Insert Kendaraan
        $data_kendaraan= [
            ["nama_kendaraan"=>"Brio","jenis_kendaraan"=>"A"],
            ["nama_kendaraan"=>"Sirion","jenis_kendaraan"=>"A"],
            ["nama_kendaraan"=>"Cortez","jenis_kendaraan"=>"A"],
            ["nama_kendaraan"=>"Jazz","jenis_kendaraan"=>"A"],
            ["nama_kendaraan"=>"Gran Max","jenis_kendaraan"=>"A"],
            ["nama_kendaraan"=>"Panther","jenis_kendaraan"=>"A"],
            ["nama_kendaraan"=>"Mobilio","jenis_kendaraan"=>"A"],
            ["nama_kendaraan"=>"Rocky","jenis_kendaraan"=>"A"],
            ["nama_kendaraan"=>"Tucson","jenis_kendaraan"=>"A"],
            ["nama_kendaraan"=>"HRV","jenis_kendaraan"=>"A"],
            ["nama_kendaraan"=>"Picanto","jenis_kendaraan"=>"A"],
            ["nama_kendaraan"=>"Creta","jenis_kendaraan"=>"A"],
            ["nama_kendaraan"=>"CRV","jenis_kendaraan"=>"A"],
            ["nama_kendaraan"=>"Luxio","jenis_kendaraan"=>"A"],
            ["nama_kendaraan"=>"Santa Fe","jenis_kendaraan"=>"A"],
            ["nama_kendaraan"=>"BRV","jenis_kendaraan"=>"A"],
            ["nama_kendaraan"=>"Sigra","jenis_kendaraan"=>"A"],
            ["nama_kendaraan"=>"Orlando","jenis_kendaraan"=>"A"],
            ["nama_kendaraan"=>"Sirion","jenis_kendaraan"=>"A"],
            ["nama_kendaraan"=>"Corolla","jenis_kendaraan"=>"A"],
            ["nama_kendaraan"=>"Picanto","jenis_kendaraan"=>"A"],
            ["nama_kendaraan"=>"Veroza","jenis_kendaraan"=>"A"],
            ["nama_kendaraan"=>"Sienta","jenis_kendaraan"=>"A"],
            ["nama_kendaraan"=>"Captiva","jenis_kendaraan"=>"A"],
            ["nama_kendaraan"=>"Karimun","jenis_kendaraan"=>"A"],
            ["nama_kendaraan"=>"Etios","jenis_kendaraan"=>"A"],
            ["nama_kendaraan"=>"Mini Cooper","jenis_kendaraan"=>"A"],
            ["nama_kendaraan"=>"Swift","jenis_kendaraan"=>"A"],
            ["nama_kendaraan"=>"Ayla","jenis_kendaraan"=>"A"],
            ["nama_kendaraan"=>"Ertiga","jenis_kendaraan"=>"A"],
            ["nama_kendaraan"=>"Xenia","jenis_kendaraan"=>"A"],
            ["nama_kendaraan"=>"XL-7","jenis_kendaraan"=>"A"],
            ["nama_kendaraan"=>"Terios","jenis_kendaraan"=>"A"],
            ["nama_kendaraan"=>"Carry","jenis_kendaraan"=>"A"],
            ["nama_kendaraan"=>"APV","jenis_kendaraan"=>"A"],
            ["nama_kendaraan"=>"City","jenis_kendaraan"=>"A"],
            ["nama_kendaraan"=>"Ignis","jenis_kendaraan"=>"A"],
            ["nama_kendaraan"=>"Civic","jenis_kendaraan"=>"A"],
            ["nama_kendaraan"=>"Baleno","jenis_kendaraan"=>"A"],
            ["nama_kendaraan"=>"Freed","jenis_kendaraan"=>"A"],
            ["nama_kendaraan"=>"S-Cross","jenis_kendaraan"=>"A"],
            ["nama_kendaraan"=>"Accord","jenis_kendaraan"=>"A"],
            ["nama_kendaraan"=>"Jimny","jenis_kendaraan"=>"A"],
            ["nama_kendaraan"=>"Agya","jenis_kendaraan"=>"A"],
            ["nama_kendaraan"=>"Vitara","jenis_kendaraan"=>"A"],
            ["nama_kendaraan"=>"Yaris","jenis_kendaraan"=>"A"],
            ["nama_kendaraan"=>"Scudo","jenis_kendaraan"=>"A"],
            ["nama_kendaraan"=>"Avanza","jenis_kendaraan"=>"A"],
            ["nama_kendaraan"=>"Juke","jenis_kendaraan"=>"A"],
            ["nama_kendaraan"=>"Kijang","jenis_kendaraan"=>"A"],
            ["nama_kendaraan"=>"Grand Livina","jenis_kendaraan"=>"A"],
            ["nama_kendaraan"=>"Calya","jenis_kendaraan"=>"A"],
            ["nama_kendaraan"=>"March","jenis_kendaraan"=>"A"],
            ["nama_kendaraan"=>"Veloz","jenis_kendaraan"=>"A"],
            ["nama_kendaraan"=>"Magnite","jenis_kendaraan"=>"A"],
            ["nama_kendaraan"=>"Rush","jenis_kendaraan"=>"A"],
            ["nama_kendaraan"=>"X-Trail","jenis_kendaraan"=>"A"],
            ["nama_kendaraan"=>"Vios","jenis_kendaraan"=>"A"],
            ["nama_kendaraan"=>"Xpander","jenis_kendaraan"=>"A"],
            ["nama_kendaraan"=>"Camry","jenis_kendaraan"=>"A"],
            ["nama_kendaraan"=>"Outlander","jenis_kendaraan"=>"A"],
            ["nama_kendaraan"=>"Mazda 2","jenis_kendaraan"=>"A"],
            ["nama_kendaraan"=>"CX-5","jenis_kendaraan"=>"A"],
            ["nama_kendaraan"=>"Datsun Go","jenis_kendaraan"=>"A"],
            ["nama_kendaraan"=>"Confero","jenis_kendaraan"=>"A"],
            ["nama_kendaraan"=>"Odyssey","jenis_kendaraan"=>"B"],
            ["nama_kendaraan"=>"Ranger","jenis_kendaraan"=>"B"],
            ["nama_kendaraan"=>"Hilux","jenis_kendaraan"=>"B"],
            ["nama_kendaraan"=>"Alphard","jenis_kendaraan"=>"B"],
            ["nama_kendaraan"=>"Fortuner","jenis_kendaraan"=>"B"],
            ["nama_kendaraan"=>"Innova","jenis_kendaraan"=>"B"],
            ["nama_kendaraan"=>"Voxy","jenis_kendaraan"=>"B"],
            ["nama_kendaraan"=>"Vellfire","jenis_kendaraan"=>"B"],
            ["nama_kendaraan"=>"Land Cruiser","jenis_kendaraan"=>"B"],
            ["nama_kendaraan"=>"Pajero","jenis_kendaraan"=>"B"],
            ["nama_kendaraan"=>"Triton","jenis_kendaraan"=>"B"],
            ["nama_kendaraan"=>"Navara","jenis_kendaraan"=>"B"],
            ["nama_kendaraan"=>"Serena","jenis_kendaraan"=>"B"],
            ["nama_kendaraan"=>"Biante","jenis_kendaraan"=>"B"],
            ["nama_kendaraan"=>"Rubicon","jenis_kendaraan"=>"B"],
            ["nama_kendaraan"=>"BMW","jenis_kendaraan"=>"B"],
            ["nama_kendaraan"=>"Mercy","jenis_kendaraan"=>"B"],
            ["nama_kendaraan"=>"D-Max","jenis_kendaraan"=>"B"],
            ["nama_kendaraan"=>"MU-X","jenis_kendaraan"=>"B"],
            ["nama_kendaraan"=>"Almaz","jenis_kendaraan"=>"B"],
            ["nama_kendaraan"=>"Haiace","jenis_kendaraan"=>"Extra"],
            ["nama_kendaraan"=>"Elf","jenis_kendaraan"=>"Extra"]
        ];
        kendaraan::insert($data_kendaraan);
        
    }



    public function down()
    {
        Schema::dropIfExists('kendaraans');
    }
}