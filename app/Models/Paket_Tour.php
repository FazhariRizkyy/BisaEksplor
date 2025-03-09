<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Paket_Tour extends Model
{
    protected $fillable = [
        'nama_paket',
        'deskripsi_tour',
        'lokasi_tour',
        'harga_tour',
        'durasi_tour',
    ];

    protected $table = 'paket_tour';
}