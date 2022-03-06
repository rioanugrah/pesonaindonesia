<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    public $table = 'posts';

    // protected $dates = ['deleted_at'];

    public $fillable = [
        'id',
        'title',
        'slug',
        'body',
        'freq',
        'priority',
    ];
}
