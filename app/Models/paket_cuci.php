<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class paket_cuci extends Model
{
    use HasFactory;
    protected $fillable =[
        'nama_paket',
        'deskripsi_paket',
    ];

    public function harga()
    {
        return $this->hasMany(harga_paket::class);
    }

    public static function getpaketlayanan($jenis_kendaraan)
    {
        $paket_cuci = paket_cuci::join('harga_pakets','harga_pakets.paket_cuci_id','paket_cucis.id')
        ->where('harga_pakets.jenis_kendaraan',$jenis_kendaraan)
        ->select('paket_cucis.*','harga_pakets.jenis_kendaraan','harga_pakets.harga_paket')
        ->get();
        return $paket_cuci;
    }
}
