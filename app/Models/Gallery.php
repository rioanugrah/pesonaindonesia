<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Gallery extends Model
{
    use SoftDeletes;
    public $table = 'gallery';
    protected $dates = ['deleted_at'];
    public $fillable = [
        'id',
        'slug',
        'title',
        'image',
    ];
}
