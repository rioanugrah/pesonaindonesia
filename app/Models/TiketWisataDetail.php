<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
// use Illuminate\Database\Eloquent\SoftDeletes;

class TiketWisataDetail extends Model
{
    // use SoftDeletes;

    public $table = 'tiket_wisata_detail';
    // protected $primaryKey = 'kode_barang';
    public $timestamps = false;
    // protected $dates = ['deleted_at'];

    public $fillable = [
        'kode_tiket',
        'tiket_wisata_id',
    ];

    public function tiket_wisata()
    {
        return $this->belongsTo(\App\Models\TiketWisata::class, 'tiket_wisata_id');
    }
}
