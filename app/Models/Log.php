<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Log extends Model
{
    public $table = 'activity_log';
    public $fillable = [
        'id',
        'log_name',
        'description',
        'subject_type',
        'subject_id',
        'causer_type',
        'causer_id',
        'properties',
    ];

    public function slider()
    {
        return $this->belongsTo(\App\Models\Slider::class, 'subject_id');
    }
}
