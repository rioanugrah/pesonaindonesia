<?php

namespace App\Models\v2;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class TransaksiPaketWisataHotel extends Model
{
    use SoftDeletes;
    public $table = 't_paket_wisata_hotel';
    protected $primaryKey = 'id';
    public $incrementing = false;
    protected $dates = ['deleted_at'];

    public $fillable = [
        'id',
        't_paket_wisata_id',
        'nama_hotel',
        'lokasi',
        'jumlah_malam',
        'check_in',
    ];
}
