<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Bromo extends Model
{
    use SoftDeletes;
    public $table = 'bromo';
    protected $primaryKey = 'id';
    public $incrementing = false;
    protected $dates = ['deleted_at'];

    public $fillable = [
        'id',
        'tanggal',
        'slug',
        'title',
        'meeting_point',
        'category_trip',
        'quota',
        'max_quota',
        // 'description',
        'include',
        'exclude',
        'price',
        'discount',
        // 'images',
    ];
}
