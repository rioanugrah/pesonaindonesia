<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Paket extends Model
{
    use SoftDeletes;

    public $table = 'paket';
    protected $primaryKey = 'id';
    public $incrementing = false;
    
    protected $dates = ['deleted_at'];

    public $fillable = [
        'id',
        'kategori_paket_id',
        'slug',
        'nama_paket',
        'deskripsi',
        'images',
        // 'price',
        // 'diskon',
    ];

    public function kategoriPaket()
    {
        return $this->belongsTo(\App\Models\KategoriPaket::class, 'kategori_paket_id');
    }
}
