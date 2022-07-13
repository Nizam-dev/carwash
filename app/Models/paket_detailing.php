<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class paket_detailing extends Model
{
    use HasFactory;
    protected $fillable = [
        'nama_detailing',
        'deskripsi_detailing',
    ];

    public function harga()
    {
        return $this->hasMany(harga_detailing::class);
    }

    public static function getpaketlayanan($jenis_kendaraan)
    {
        $paket_detailings = paket_detailing::join('harga_detailings','harga_detailings.paket_detailing_id','paket_detailings.id')
        ->where('harga_detailings.jenis_kendaraan',$jenis_kendaraan)
        ->select('paket_detailings.*','harga_detailings.jenis_kendaraan','harga_detailings.harga_detailing')
        ->get();
        return $paket_detailings;
    }
}
