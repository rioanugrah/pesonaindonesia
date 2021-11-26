<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class TiketWisata extends Model
{
    use SoftDeletes;

    public $table = 'tiket_wisata';
    // protected $primaryKey = 'kode_barang';

    protected $dates = ['deleted_at'];

    public $fillable = [
        'id',
        'user_id',
        'wisata_id',
        'jumlah_tiket',
        'total',
    ];

    public function user()
    {
        return $this->belongsTo(\App\User::class, 'user_id');
    }

    public function wisata()
    {
        return $this->belongsTo(\App\Models\Wisata::class, 'wisata_id');
    }
}
