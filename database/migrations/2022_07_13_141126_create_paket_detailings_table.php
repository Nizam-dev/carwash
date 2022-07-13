<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use App\Models\paket_detailing;
class CreatePaketDetailingsTable extends Migration
{
    public function up()
    {
        Schema::create('paket_detailings', function (Blueprint $table) {
            $table->id();
            $table->string('nama_detailing');
            $table->string('deskripsi_detailing')->nullable();
            $table->timestamps();
        });

        // Insert data
        $data = [
            ["nama_detailing"=>"Engine"],
            ["nama_detailing"=>"Windows"],
            ["nama_detailing"=>"Exterior"],
            ["nama_detailing"=>"Interior"],
            ["nama_detailing"=>"Full Detailing"],
            ["nama_detailing"=>"Semi Coating"],
            ["nama_detailing"=>"Coating"],
            ["nama_detailing"=>"Maintenance Coating"],
            ["nama_detailing"=>"Head Lamp"],
        ];
        paket_detailing::insert($data);

    }

    
    public function down()
    {
        Schema::dropIfExists('paket_detailings');
    }
}
