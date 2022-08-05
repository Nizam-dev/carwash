<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class pesanan_detailing extends Model
{
    use HasFactory;
    protected $fillable = [
       'transaksi_id',
       'paket_detailing_id',
       'harga'
    ];
}
