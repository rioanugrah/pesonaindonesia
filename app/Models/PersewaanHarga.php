<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class PersewaanHarga extends Model
{
    use SoftDeletes;

    public $table = 'persewaan_harga';

    protected $dates = ['deleted_at'];

    public $fillable = [
        'persewaan_id',
        'deskripsi',
        'harga',
        'satuan',
    ];
}
