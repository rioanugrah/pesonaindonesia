<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class RoomHotel extends Model
{
    use SoftDeletes;
    
    public $table = 'room_hotel';
    protected $dates = ['deleted_at'];
    public $fillable = [
        'id',
        'kamar_hotel_id',
        'jumlah_kamar',
    ];
}
