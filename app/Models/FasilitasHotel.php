<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class FasilitasHotel extends Model
{
    use SoftDeletes;
    public $table = 'fasilitas_hotel';
    protected $dates = ['deleted_at'];
    public $fillable = [
        'id',
        'hotel_id',
        'nama_fasilitas',
        'icon',
    ];
}
