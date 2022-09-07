<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class KategoriPaket extends Model
{
    // use SoftDeletes;

    public $table = 'kategori_paket';

    // public $incrementing = false;
    protected $primaryKey = 'id';
    protected $dates = ['deleted_at'];
    // public $timestamps = false;

    public $fillable = [
        'id',
        'kategori_paket',
    ];
}
