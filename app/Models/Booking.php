<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{
    protected $fillable = [
        'id_pengguna',
        'id_paket',
        'tanggal_booking',
        'jumlah_orang',
        'total_harga',
        'status_pembayaran',
        'metode_pembayaran'
    ];
    protected $table = 'booking';
}
