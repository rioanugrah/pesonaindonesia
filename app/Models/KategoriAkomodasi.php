<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class KategoriAkomodasi extends Model
{
    use SoftDeletes;

    public $table = 'kategori_akomodasi';

    // public $incrementing = false;
    // protected $primaryKey = 'id';
    protected $dates = ['deleted_at'];
    // public $timestamps = false;

    public $fillable = [
        'id',
        'kategori_akomodasi',
        'status',
    ];
}
