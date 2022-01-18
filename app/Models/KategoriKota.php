<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class KategoriKota extends Model
{
    // use SoftDeletes;

    public $table = 'kategori_kota';

    // public $incrementing = false;
    // protected $primaryKey = 'id';
    protected $dates = ['deleted_at'];
    // public $timestamps = false;

    public $fillable = [
        'id',
        'kota',
        'image',
    ];
}
