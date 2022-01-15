<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Kecamatan extends Model
{
    use SoftDeletes;

    public $table = 'kecamatan';

    protected $dates = ['deleted_at'];

    public $fillable = [
        'id',
        'id_kota',
        'nama',
    ];
}
