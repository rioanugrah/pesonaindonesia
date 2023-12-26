<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class BuktiPembayaran extends Model
{
    use SoftDeletes;
    public $table = 'bukti_pembayaran';
    public $incrementing = false;
    protected $primaryKey = 'id';
    protected $dates = ['deleted_at'];
    public $fillable = [
        'id',
        'id_transaksi',
        'kode_transaksi',
        'images',
    ];
}
