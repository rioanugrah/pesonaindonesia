<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Notifications\Notifiable;

class Notice extends Model
{
    use Notifiable;
    // use SoftDeletes;
    public $table = 'notice';
    protected $primaryKey = 'id';

    protected $dates = ['deleted_at'];
    public $incrementing = false;

    public $fillable = [
        'id',
        'notice',
        'noticedes',
        'noticelink',
        'telegramid',
    ];
}
