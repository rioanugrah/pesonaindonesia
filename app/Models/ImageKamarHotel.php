<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ImageKamarHotel extends Model
{
    use SoftDeletes;
    
    public $table = 'image_kamar_hotel';
    protected $dates = ['deleted_at'];
    public $fillable = [
        'id',
        'kamar_hotel_id',
        'image',
    ];
}
