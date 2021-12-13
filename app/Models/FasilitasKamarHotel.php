<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class FasilitasKamarHotel extends Model
{
    use SoftDeletes;
    
    public $table = 'fasilitas_kamar_hotel';
    protected $dates = ['deleted_at'];
    public $fillable = [
        'id',
        'kamar_hotel_id',
        'fasilitas_kamar',
    ];
}
