<?php

namespace App\Models\v2;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Tour extends Model
{
    use SoftDeletes;
    public $table = 'tour';
    protected $primaryKey = 'id';
    public $incrementing = false;

    protected $dates = ['deleted_at'];
    
    public $fillable = [
        'id',
        'user_id',
        'kode_tour',
        'title',
        'slug',
        'jenis_tour',
        'deskripsi',
        'tour_category_id',
        'min_people',
        'max_people',
        'location',
        // 'address',
        'current_price',
        'previous_price',
        'discount',
        'include',
        'exclude',
        'facilities',
        'itinerary',
        'faq',
        'images',
        'status',
    ];
}
