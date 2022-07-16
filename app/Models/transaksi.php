<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class transaksi extends Model
{
    use HasFactory;
    protected $fillable = [
        'kode_transaksi',
        'nama_pegawai',
        'plat_nomor',
        'kendaraan_id',
        'customer_id',
        'total',
        'status',
    ];

    public function detailing()
    {
        return $this->hasMany(pesanan_detailing::class)
        ->join('paket_detailings','paket_detailings.id','pesanan_detailings.paket_detailing_id')
        ->select('pesanan_detailings.*','paket_detailings.nama_detailing')
        ;
    }

    public function cuci()
    {
        return $this->hasMany(pesanan_paket::class)
        ->join('paket_cucis','paket_cucis.id','pesanan_pakets.paket_cuci_id')
        ->select('pesanan_pakets.*','paket_cucis.nama_paket')
        ;
    }

}
