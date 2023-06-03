<?php

namespace App\Models\v2;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class TourAttributeDetail extends Model
{
    use SoftDeletes;
    public $table = 'tour_attribute_detail';
    protected $primaryKey = 'id';
    public $incrementing = false;

    protected $dates = ['deleted_at'];

    public $fillable = [
        'id',
        'tour_attribute_id',
        'nama_attribute',
    ];

    public function tour_attribute()
    {
        return $this->belongsTo(\App\Models\v2\TourAttribute::class, 'tour_attribute_id');
    }
}
