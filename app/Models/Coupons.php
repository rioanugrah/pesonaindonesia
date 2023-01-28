<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Coupons extends Model
{
    use SoftDeletes;
    
    public $table = 'coupons';
    protected $primaryKey = 'id';
    public $incrementing = false;

    protected $dates = ['deleted_at'];

    public $fillable = [
        'id',
        'kategori_akomodasi_id',
        'coupons_code',
        'coupons_title',
        'coupons_type',
        'coupons_amount',
        'coupons_discount',
        'coupons_description',
        'coupons_limit',
        'coupons_expired',
        'coupons_images',
    ];
}
