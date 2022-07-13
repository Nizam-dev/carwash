<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class kendaraan extends Model
{
    use HasFactory;
    public $timestamps = true;
    protected $fillable=[
        'nama_kendaraan',
        'jenis_kendaraan',
    ];
}
