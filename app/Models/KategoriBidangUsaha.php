<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class KategoriBidangUsaha extends Model
{
    use SoftDeletes;

    public $table = 'kategori_bidang_usaha';

    protected $dates = ['deleted_at'];

    public $fillable = [
        'nama_bidang_usaha',
    ];
}
