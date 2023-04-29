<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class KategoriPersewaan extends Model
{
    use SoftDeletes;

    public $table = 'kategori_persewaan';

    protected $dates = ['deleted_at'];

    public $fillable = [
        'nama_kategori',
    ];
}
