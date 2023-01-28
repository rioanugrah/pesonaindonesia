<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class CouponsUsed extends Model
{
    use SoftDeletes;
    
    public $table = 'coupons_used';
    // protected $primaryKey = 'id';
    // public $incrementing = false;

    protected $dates = ['deleted_at'];

    public $fillable = [
        'id',
        'coupons_id',
        'kategori_akomodasi_id',
        'akomodasi_id',
        'status',
    ];

    public function coupon()
    {
        return $this->belongsTo(\App\Models\Coupons::class, 'coupons_id');
    }

    public function kategori_akomodasi()
    {
        return $this->belongsTo(\App\Models\KategoriAkomodasi::class, 'kategori_akomodasi_id');
    }

    public function akomodasi()
    {
        if(kategori_akomodasi()->kategori_akomodasi == 'Travelling'){
            return $this->belongsTo(\App\Models\Travelling::class, 'akomodasi_id');
        }
    }
}
