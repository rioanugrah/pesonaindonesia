<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
// use Illuminate\Database\Eloquent\SoftDeletes;

class Cart extends Model
{
    // use SoftDeletes;

    public $table = 'cart';

    public $incrementing = false;
    protected $primaryKey = 'id';
    protected $dates = ['deleted_at'];
    public $timestamps = false;

    public $fillable = [
        'id',
        'user_id',
        'kode_booking',
        'is_cart',
        'price',
        'is_cart',
        'created_at',
        'updated_at',
    ];

    public function user()
    {
        return $this->belongsTo(\App\User::class, 'user_id');
    }
}
