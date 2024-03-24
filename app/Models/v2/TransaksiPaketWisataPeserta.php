<?php

namespace App\Models\v2;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class TransaksiPaketWisataPeserta extends Model
{
    use SoftDeletes;
    public $table = 't_paket_wisata_peserta';
    protected $primaryKey = 'id';
    public $incrementing = false;
    protected $dates = ['deleted_at'];

    public $fillable = [
        'id',
        't_paket_wisata_id',
        'nama_peserta',
        'email',
        'no_telp',
    ];
}
