<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Paket extends Model
{
    use SoftDeletes;

    public $table = 'paket';

    protected $dates = ['deleted_at'];

    public $fillable = [
        'id',
        'slug',
        'nama_paket',
        'price',
        'deskripsi',
        'images',
    ];
}