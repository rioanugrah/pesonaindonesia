<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Events extends Model
{
    use SoftDeletes;
    public $table = 'event';
    protected $dates = ['deleted_at'];
    public $fillable = [
        'id',
        'slug',
        'title',
        'deskripsi',
        'location',
        'start_event',
        'finish_event',
        'image',
        'is_event',
    ];
}
