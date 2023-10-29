<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class VerifikasiTiket extends Model
{
    use SoftDeletes;

    public $table = 'verifikasi_tiket';

    public $incrementing = false;
    protected $primaryKey = 'id';
    protected $dates = ['deleted_at'];
    // public $timestamps = false;

    public $fillable = [
        'id',
        'transaction_id',
        'kode_tiket',
        'tanggal_booking',
        'nama_tiket',
        'nama_order',
        'address',
        'email',
        'phone',
        'qty',
        'price',
        'status',
    ];

    public function verifikasi_tiket_list()
    {
        return $this->hasMany(\App\Models\VerifikasiTiketList::class, 'verifikasi_tiket_id');
    }
}
