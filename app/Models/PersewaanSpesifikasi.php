<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class PersewaanSpesifikasi extends Model
{
    use SoftDeletes;

    public $table = 'persewaan_spesifikasi';

    protected $dates = ['deleted_at'];

    public $fillable = [
        'persewaan_id',
        'icon',
        'spesifikasi',
    ];
}
