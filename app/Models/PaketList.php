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
        'paket_id',
        'nama_paket',
        'jumlah_paket',
        'price',
        'diskon',
        'deskripsi',
        'images',
        'status',
    ];

    public function pakets()
    {
        return $this->belongsTo(\App\Models\Paket::class, 'paket_id');
    }
}
