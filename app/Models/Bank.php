<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Bank extends Model
{
    // use SoftDeletes;
    public $table = 'bank';
    protected $dates = ['deleted_at'];
    public $fillable = [
        'id',
        'nama_bank',
        'nama_penerima',
        'nomor_rekening',
        'status',
    ];
}
