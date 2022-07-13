<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class harga_detailing extends Model
{
    use HasFactory;
    protected $fillable = [
        'harga_detailing',
        'lama_pengerjaan',
        'jenis_kendaraan',
        'paket_detailing_id',
    ];
}
