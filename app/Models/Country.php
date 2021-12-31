<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Country extends Model
{

    public $table = 'country';

    protected $dates = ['deleted_at'];

    public $fillable = [
        'id',
        'nama_negara',
        'kode_negara',
        'kode_telepon',
        'region',
    ];
}
