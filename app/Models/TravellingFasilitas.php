<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class TravellingFasilitas extends Model
{
    use SoftDeletes;
    public $table = 'travelling_fasilitas';
    // protected $primaryKey = 'id';
    // public $incrementing = false;
    protected $dates = ['deleted_at'];
}
