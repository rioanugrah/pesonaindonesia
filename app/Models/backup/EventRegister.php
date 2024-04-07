<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class EventRegister extends Model
{
    use SoftDeletes;
    public $table = 'event_register';
    protected $dates = ['deleted_at'];
    public $fillable = [
        'id',
        'event_id',
        'kode_tiket',
        'first_name',
        'last_name',
        'email',
        'kategori_asal',
        'asal',
        'alamat',
        'is_event_register',
        'no_telp',
    ];
}
