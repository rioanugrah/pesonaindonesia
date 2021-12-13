<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class KebijakanKamarHotel extends Model
{
    use SoftDeletes;
    
    public $table = 'kebijakan_kamar_hotel';
    protected $dates = ['deleted_at'];
    public $fillable = [
        'id',
        'kamar_hotel_id',
        'judul_kebijakan_kamar',
        'deskripsi_kebijakan_kamar',
    ];
}
