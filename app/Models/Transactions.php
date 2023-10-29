<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Transactions extends Model
{
    use SoftDeletes;

    public $table = 'transaction';
    protected $primaryKey = 'id';
    public $incrementing = false;

    protected $dates = ['deleted_at'];

    public $fillable = [
        'id',
        'transaction_code',
        'transaction_unit',
        'transaction_order',
        'transaction_qty',
        'transaction_price',
        'user',
        'status',
    ];

    public function verifikasi_tiket()
    {
        return $this->belongsTo(\App\Models\VerifikasiTiket::class, 'id');
    }
}
