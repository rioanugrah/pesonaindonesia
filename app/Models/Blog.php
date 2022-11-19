<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Blog extends Model
{
    use SoftDeletes;

    public $table = 'blog';

    protected $dates = ['deleted_at'];

    public $fillable = [
        'id',
        'slug',
        'title',
        'author',
        'description',
        'image',
    ];
}
