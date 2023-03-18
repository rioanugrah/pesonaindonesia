<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class VendorsProduct extends Model
{
    use SoftDeletes;

    public $table = 'vendors_product';

    protected $dates = ['deleted_at'];

    public $fillable = [
        'id',
        'vendors_id',
        'kode_produk',
        'nama_produk',
        'deskripsi',
        'price',
        'discount',
        'images',
    ];

    public function vendors()
    {
        return $this->belongsTo(\App\Models\Vendors::class,'vendors_id');
    }
}
