<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class KebijakanHotel extends Model
{
    use SoftDeletes;
    
    public $table = 'kebijakan_hotel';
    protected $dates = ['deleted_at'];
    public $fillable = [
        'id',
        'hotel_id',
        'judul',
        'deskripsi',
    ];
}
