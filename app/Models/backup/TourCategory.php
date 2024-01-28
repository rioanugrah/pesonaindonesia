<?php

namespace App\Models\v2;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class TourCategory extends Model
{
    use SoftDeletes;
    public $table = 'tour_category';
    protected $primaryKey = 'id';
    public $incrementing = false;

    protected $dates = ['deleted_at'];

    public $fillable = [
        'id',
        'nama_kategori',
        'slug',
        'status',
    ];
}
