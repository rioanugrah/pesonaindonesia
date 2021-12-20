<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Hotel extends Model
{
    use SoftDeletes;

    public $table = 'hotel';

    protected $dates = ['deleted_at'];

    public $fillable = [
        'id',
        'nama_hotel',
        'alamat',
        'deskripsi',
        'layanan',
    ];
}
