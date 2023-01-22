<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class CouponsDetails extends Model
{
    use SoftDeletes;
    
    public $table = 'coupons_details';
    protected $primaryKey = 'id';
    public $incrementing = false;

    protected $dates = ['deleted_at'];

    public $fillable = [
        'id',
        'coupons_id',
        'name',
        'email',
    ];
}
