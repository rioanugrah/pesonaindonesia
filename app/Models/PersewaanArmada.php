<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class PersewaanArmada extends Model
{
    use SoftDeletes;

    public $table = 'persewaan_armada';

    protected $dates = ['deleted_at'];

    public $fillable = [
        'persewaan_id',
        'armada',
    ];
}
