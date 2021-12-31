<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ContactUs extends Model
{
    use SoftDeletes;

    public $table = 'contact_us';

    protected $dates = ['deleted_at'];

    public $fillable = [
        'id',
        'name',
        'email',
        'subject',
        'message',
    ];
}
