<?php

namespace App\Models\PlesiranMalang;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class TourImages extends Model
{
    use SoftDeletes;

    protected $connection= 'plesiran_malang';
    
    public $table = 'tour_image';
    // protected $primaryKey = 'id';
    // public $incrementing = false;

    protected $dates = ['deleted_at'];

    public $fillable = [
        'id',
        'tour_id',
        'images',
    ];
}
