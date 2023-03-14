<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Vendors extends Model
{
    use SoftDeletes;

    public $table = 'vendors';

    protected $dates = ['deleted_at'];

    public $fillable = [
        'id',
        'kode_vendor',
        'nama',
        'alamat',
        'email',
        'no_telp',
        'perusahaan',
    ];
}
