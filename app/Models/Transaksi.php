<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
// use Illuminate\Database\Eloquent\SoftDeletes;

class Transaksi extends Model
{
    // use SoftDeletes;

    public $table = 'transaksi';

    public $incrementing = false;
    protected $primaryKey = 'id';
    protected $dates = ['deleted_at'];
    public $timestamps = false;

    public $fillable = [
        'id',
        'nama_penerima',
        'partner_tx_id',
        'total',
        'created_at',
        'updated_at',
    ];
}
