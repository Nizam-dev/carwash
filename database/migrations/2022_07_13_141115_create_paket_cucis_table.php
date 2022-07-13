<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use App\Models\paket_cuci;

class CreatePaketCucisTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('paket_cucis', function (Blueprint $table) {
            $table->id();
            $table->string('nama_paket');
            $table->text('deskripsi_paket');
            $table->timestamps();
        });

        // Insert Data
        $paket =[
            [
                "nama_paket"=>"Quick Wash",
                "deskripsi_paket"=>"Hand Wash, Tire Polish, Interior Cleaning, Vacuum"
            ],
            [
                "nama_paket"=>"Ultimate Quick Wash",
                "deskripsi_paket"=>"All In Quick Wash, Windows Cleaning"
            ],
            [
                "nama_paket"=>"Wax Wash",
                "deskripsi_paket"=>"All In Quick Wash, Body Wax"
            ],
            [
                "nama_paket"=>"Ultimate Wax Wash",
                "deskripsi_paket"=>"All In Wax Wash, Windows Cleaning"
            ],
            [
                "nama_paket"=>"Nano Wash",
                "deskripsi_paket"=>"All In Quick Wash, Body Polish"
            ],
            [
                "nama_paket"=>"Ultimate Nano Wash",
                "deskripsi_paket"=>"All In Nano Wash, Windows Cleaning"
            ],
        ];
        paket_cuci::insert($paket);

    }

   

    public function down()
    {
        Schema::dropIfExists('paket_cucis');
    }
}
