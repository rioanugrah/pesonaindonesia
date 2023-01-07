<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Travelling extends Model
{
    use SoftDeletes;
    public $table = 'travelling';
    protected $primaryKey = 'id';
    public $incrementing = false;
    protected $dates = ['deleted_at'];

    public $fillable = [
        'id',
        'kategori_paket_id',
        'slug',
        'nama_travelling',
        'deskripsi',
        'jumlah_paket',
        'meeting_point',
        'tanggal_rilis',
        'location',
        'contact_person',
        'price',
        'diskon',
        'images',
    ];

    public function kategoriPaket()
    {
        return $this->belongsTo(\App\Models\KategoriPaket::class, 'kategori_paket_id');
    }

    public function travellingHighlight()
    {
        return $this->hasMany(\App\Models\TravellingHighlight::class, 'travelling_id');
    }
    public function travellingFasilitas()
    {
        return $this->hasMany(\App\Models\TravellingFasilitas::class, 'travelling_id');
    }
}
