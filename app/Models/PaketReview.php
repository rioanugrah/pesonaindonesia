<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class PaketReview extends Model
{
    use SoftDeletes;
    public $table = 'paket_review';
    protected $dates = ['deleted_at'];
    public $fillable = [
        'id',
        'paket_list_id',
        'name',
        'email',
        'star',
        'images',
        'comment'
    ];
}
