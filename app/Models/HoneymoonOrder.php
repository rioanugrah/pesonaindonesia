<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class HoneymoonOrder extends Model
{
    use SoftDeletes;

    public $table = 'honeymoon_order';
    protected $primaryKey = 'id';
    public $incrementing = false;
    
    protected $dates = ['deleted_at'];

    public $fillable = [
        'id',
        'honeymoon_id',
        'kode_invoice',
        'data_pria',
        'data_wanita',
        'email',
        'no_telp',
        'alamat',
        'wedding_date',
        'departure_date',
        'return_date',
        'price',
        'qty',
        'payment',
    ];

    public function honeymoon()
    {
        return $this->belongsTo(\App\Models\Honeymoon::class, 'honeymoon_id');
    }
}
