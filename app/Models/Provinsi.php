<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Provinsi extends Model
{
    use SoftDeletes;

    public $table = 'provinsi';

    protected $dates = ['deleted_at'];

    public $fillable = [
        'id',
        'nama',
    ];
}
