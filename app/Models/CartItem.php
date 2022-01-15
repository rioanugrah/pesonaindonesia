<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
// use Illuminate\Database\Eloquent\SoftDeletes;

class CartItem extends Model
{
    // use SoftDeletes;

    public $table = 'cart_item';

    protected $dates = ['deleted_at'];
    public $timestamps = false;

    public $fillable = [
        'id',
        'cart_id',
        'nama_item',
        'qty',
        'price',
        'created_at',
        'updated_at',
    ];

    public function user()
    {
        return $this->belongsTo(\App\User::class, 'user_id');
    }
}
