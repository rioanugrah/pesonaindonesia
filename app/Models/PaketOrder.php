<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class PaketOrder extends Model
{
    // use SoftDeletes;

    public $table = 'order_paket';
    protected $primaryKey = 'id';
    public $incrementing = false;
    
    // protected $dates = ['deleted_at'];

    public $fillable = [
        'id',
        'nama_paket',
        'pemesan',
        'bank',
        'qty',
        'price',
        'status',
    ];
}
