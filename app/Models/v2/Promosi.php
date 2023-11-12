<?php

namespace App\Models\v2;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Promosi extends Model
{
    use SoftDeletes;
    public $table = 'promosi';
    protected $dates = ['deleted_at'];

    public $fillable = [
        'id_generate',
        'slug',
        'nama_promosi',
        'deskripsi',
        'images',
    ];
}
