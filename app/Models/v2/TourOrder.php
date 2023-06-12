<?php

namespace App\Models\v2;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class TourOrder extends Model
{
    use SoftDeletes;
    public $table = 'tour_order';
    protected $primaryKey = 'id';
    public $incrementing = false;

    protected $dates = ['deleted_at'];

    public $fillable = [
        'id',
        'kode_order',
        'nama_order',
        'tanggal_booking',
        'day',
        'payment_metode',
        'transaksi_id',
        'detail_informasi',
        'price',
        'status',
    ];
}
