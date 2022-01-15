<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Hotel extends Model
{
    use SoftDeletes;

    public $table = 'hotel';

    protected $dates = ['deleted_at'];

    public $fillable = [
        'id',
        'slug',
        'nama_hotel',
        'alamat',
        'deskripsi',
        'layanan',
        'provinsi',
        'kota_kabupaten',
        'kecamatan',
    ];

    public function provinsis()
    {
        return $this->belongsTo(\App\Models\Provinsi::class, 'provinsi');
    }
    public function kotas()
    {
        return $this->belongsTo(\App\Models\KabupatenKota::class, 'kota_kabupaten');
    }
    public function kecamatans()
    {
        return $this->belongsTo(\App\Models\Kecamatan::class, 'kecamatan');
    }
}
