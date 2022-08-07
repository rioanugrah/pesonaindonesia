<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class PaketImages extends Model
{
    use SoftDeletes;

    public $table = 'paket_images';
    // protected $primaryKey = 'id';
    // public $incrementing = false;
    
    protected $dates = ['deleted_at'];

    public $fillable = [
        'id',
        'paket_id',
        'images',
    ];
}
