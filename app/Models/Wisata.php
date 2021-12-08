<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Wisata extends Model
{
    use SoftDeletes;

    public $table = 'wisata';
    // protected $primaryKey = 'kode_barang';

    protected $dates = ['deleted_at'];

    public $fillable = [
        'nama_wisata',
        'deskripsi',
        'alamat',
        'fasilitas',
        'highlight',
        'timeline',
        'tukar_tiket',
        'sk',
        'info_tambahan',
        'latitude',
        'longitude',
        'price',
        'image',
        'diskon',
        'periode_awal',
        'periode_akhir',
    ];
}
