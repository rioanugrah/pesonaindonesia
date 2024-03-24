<?php

namespace App\Models\v2;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class TransaksiPaketWisataMaskapai extends Model
{
    use SoftDeletes;
    public $table = 't_paket_wisata_maskapai';
    protected $primaryKey = 'id';
    public $incrementing = false;
    protected $dates = ['deleted_at'];

    public $fillable = [
        'id',
        't_paket_wisata_id',
        'nama_maskapai',
        'no_penerbangan',
        'arah',
        'jam_berangkat',
        'remaks',
        'harga',
    ];
}
