<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class pesanan_paket extends Model
{
    use HasFactory;
    protected $fillable = [
       'transaksi_id',
       'paket_cuci_id',
       'harga'
    ];
}
