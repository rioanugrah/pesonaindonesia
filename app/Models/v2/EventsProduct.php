<?php

namespace App\Models\v2;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class EventsProduct extends Model
{
    use SoftDeletes;
    public $table = 'event_product';
    protected $primaryKey = 'id';
    public $incrementing = false;
    protected $dates = ['deleted_at'];
    public $fillable = [
        'id',
        'event_id',
        'product',
        'quota',
        'price',
    ];
}
