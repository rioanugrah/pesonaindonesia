<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Slider extends Model
{
    public $table = 'slider';
    public $fillable = [
        'id',
        'nama_slider',
        'image',
        'status',
    ];

}
