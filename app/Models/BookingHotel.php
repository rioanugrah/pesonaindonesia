<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class BookingHotel extends Model
{
    use SoftDeletes;

    public $table = 'booking_hotel';

    protected $dates = ['deleted_at'];

    public $fillable = [
        'id',
        'kode_booking',
        'hotel_id',
        'user_id',
        'name_booking',
        'email_booking',
        'phone_booking',
        'booking_date',
        'total',
    ];

    public function hotel()
    {
        return $this->belongsTo(\App\Models\Hotel::class, 'hotel_id');
    }
}
