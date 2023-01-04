<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class TravellingHighlight extends Model
{
    use SoftDeletes;
    public $table = 'travelling_highlight';
    // protected $primaryKey = 'id';
    // public $incrementing = false;
    protected $dates = ['deleted_at'];
}
