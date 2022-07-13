<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class harga_paket extends Model
{
    use HasFactory;
    protected $fillable = [
        'harga_paket',
        'lama_pengerjaan',
        'jenis_kendaraan',
        'paket_cuci_id'
    ];
}
