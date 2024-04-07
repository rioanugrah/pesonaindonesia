<?php

namespace App\Models\v2;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Events extends Model
{
    use SoftDeletes;
    public $table = 'event';
    protected $primaryKey = 'id';
    public $incrementing = false;
    protected $dates = ['deleted_at'];
    public $fillable = [
        'id',
        'title',
        'slug',
        'description',
        'team_lead',
        'committee',
        'schedules',
        'location',
        'cover_image',
        'image',
        'user_id',
        'status',
    ];

    public function event_product()
    {
        return $this->hasMany(\App\Models\v2\EventsProduct::class, 'event_id')->orderBy('price','asc');
    }
}
