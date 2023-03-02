<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
// use Illuminate\Database\Eloquent\SoftDeletes;

class OrderList extends Model
{
    // use SoftDeletes;

    public $table = 'order_list';
    protected $primaryKey = 'id';
    public $incrementing = false;

    // protected $dates = ['deleted_at'];

    public $fillable = [
        'id',
        'order_id',
        'pemesan',
        'qty',
    ];

    public function order()
    {
        return $this->belongsTo(\App\Models\Order::class,'order_id');
    }

}
