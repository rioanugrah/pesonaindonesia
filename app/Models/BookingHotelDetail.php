<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class BookingHotelDetail extends Model
{
    use SoftDeletes;

    public $table = 'booking_hotel_detail';

    protected $dates = ['deleted_at'];

    public $fillable = [
        'id',
        'booking_hotel_id',
        'no_kamar',
        'nama_kamar',
        'jumlah_kamar',
        'harga',
    ];

    
}
