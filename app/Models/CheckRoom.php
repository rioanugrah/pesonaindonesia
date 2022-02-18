<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class CheckRoom extends Model
{
    use SoftDeletes;

    public $table = 'check_room';
    protected $primaryKey = 'id';

    protected $dates = ['deleted_at'];

    public $fillable = [
        'id',
        'kode_booking',
        'hotel_id',
        'kamar_hotel_id',
        'check_in',
        'check_out',
    ];
    public function hotel()
    {
        return $this->belongsTo(\App\Models\Hotel::class, 'hotel_id');
    }
    public function kamar()
    {
        return $this->belongsTo(\App\Models\KamarHotel::class, 'kamar_hotel_id');
    }
}
