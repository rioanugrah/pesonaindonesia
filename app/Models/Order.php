<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Order extends Model
{
    use SoftDeletes;

    public $table = 'order';
    protected $primaryKey = 'id';
    public $incrementing = false;

    protected $dates = ['deleted_at'];

    public $fillable = [
        'id',
        // 'icon',
        'kode_order',
        'nama_order',
        'pemesan',
        // 'bank',
        'qty',
        'price',
        'user',
        'status',
    ];

    public function orderList()
    {
        return $this->hasMany(\App\Models\OrderList::class, 'order_id');
    }

}
