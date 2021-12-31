<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class KamarHotel extends Model
{
    use SoftDeletes;
    
    public $table = 'kamar_hotel';
    protected $dates = ['deleted_at'];
    public $fillable = [
        'id',
        'hotel_id',
        'slug',
        'nama_kamar',
        'deskripsi_kamar',
        'price',
    ];
    public function hotel()
    {
        return $this->belongsTo(\App\Models\Hotel::class, 'hotel_id');
    }
}
