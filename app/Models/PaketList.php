<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class PaketList extends Model
{
    use SoftDeletes;

    public $table = 'paket_list';
    protected $primaryKey = 'id';
    public $incrementing = false;
    
    protected $dates = ['deleted_at'];

    public $fillable = [
        'id',
        'kategori_paket_id',
        'paket_id',
        'nama_paket',
        'jumlah_paket',
        'price',
        'diskon',
        'deskripsi',
        'alamat',
        'meeting_point',
        'include',
        'depature',
        'images',
        'status',
    ];

    public function pakets()
    {
        return $this->belongsTo(\App\Models\Paket::class, 'paket_id');
    }
    public function kategoriPaket()
    {
        return $this->belongsTo(\App\Models\KategoriPaket::class, 'kategori_paket_id');
    }
}
