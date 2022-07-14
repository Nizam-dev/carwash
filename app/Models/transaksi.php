<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class transaksi extends Model
{
    use HasFactory;
    protected $fillable = [
        'transaksi_id',
        'nomor_antrian',
        'plat_nomor',
        'kendaraan_id',
        'customer_id',
        'total',
        'status',
    ];

    public function detailing()
    {
        return $this->hasMany(pesanan_detailing::class);
    }

    public function cuci()
    {
        return $this->hasMany(pesanan_paket::class);
    }

}
