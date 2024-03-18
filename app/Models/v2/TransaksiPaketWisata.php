<?php

namespace App\Models\v2;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class TransaksiPaketWisata extends Model
{
    use SoftDeletes;
    public $table = 't_paket_wisata';
    protected $primaryKey = 'id';
    public $incrementing = false;
    protected $dates = ['deleted_at'];

    public $fillable = [
        'id',
        'kode',
        'nama_keberangkatan',
        'jenis_tujuan',
        'tujuan_wisata',
        'jenis_keberangkatan',
        'tour_leader',
        'objek_wisata',
        'waktu_keberangkatan',
        'dunia_wisata',
        'kuota_peserta',
        'remaks',
        'status',
    ];

    public function detail_wisata_hotel()
    {
        return $this->hasMany(\App\Models\v2\TransaksiPaketWisataHotel::class, 't_paket_wisata_id');
    }

    public function detail_wisata_maskapai()
    {
        return $this->hasMany(\App\Models\v2\TransaksiPaketWisataMaskapai::class, 't_paket_wisata_id');
    }
}
