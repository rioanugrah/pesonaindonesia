<?php

namespace App\Models\v2;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Tour extends Model
{
    use SoftDeletes;
    public $table = 'tour';
    protected $dates = ['deleted_at'];

    public $fillable = [
        'id',
        'id_generate',
        'slug',
        'title',
        'description',
        'itinerary',
        'include',
        'exclude',
        'location',
        'duration',
        'price',
        'images',
        'detail_images',
    ];
}
