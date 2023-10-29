<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class VerifikasiTiketList extends Model
{
    use SoftDeletes;

    public $table = 'verifikasi_tiket_list';

    public $incrementing = false;
    protected $primaryKey = 'id';
    protected $dates = ['deleted_at'];
    // public $timestamps = false;

    public $fillable = [
        'id',
        'verifikasi_tiket_id',
        'nama_order',
        // 'alamat',
        // 'email',
        // 'phone',
        'qty',
        // 'price',
        // 'status',
    ];
}
