<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Status extends Model
{
    use SoftDeletes;

    public $table = 'status';
    // protected $primaryKey = 'kode_barang';

    protected $dates = ['deleted_at'];

    public $fillable = [
        'id',
        'nama_status',
        'persen',
        'status',
    ];
}
