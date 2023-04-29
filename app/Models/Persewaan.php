<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Persewaan extends Model
{
    use SoftDeletes;

    public $table = 'persewaan';

    protected $dates = ['deleted_at'];

    public $fillable = [
        'kode_persewaan',
        'kategori_persewaan_id',
        'nama_barang',
        'kab_kota',
        'provinsi',
        'images',
        'user_id',
    ];
}
