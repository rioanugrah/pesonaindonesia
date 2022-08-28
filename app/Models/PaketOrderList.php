<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class PaketOrderList extends Model
{
    // use SoftDeletes;

    public $table = 'order_paket_list';
    // protected $primaryKey = 'id';
    // public $incrementing = false;
    
    // protected $dates = ['deleted_at'];

    public $fillable = [
        'id',
        'order_paket_id',
        'pemesan',
        'qty',
    ];
}
