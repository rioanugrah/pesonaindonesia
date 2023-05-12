<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Honeymoon extends Model
{
    use SoftDeletes;

    public $table = 'honeymoon';
    protected $primaryKey = 'id';
    public $incrementing = false;
    
    protected $dates = ['deleted_at'];

    public $fillable = [
        'id',
        'slug',
        'kode_paket',
        'nama_paket',
        'deskripsi',
        'price',
        'qty',
        'images',
    ];
}
