<?php

namespace App\Models\v2;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Invoice extends Model
{
    use SoftDeletes;
    public $table = 'invoice';
    // protected $primaryKey = 'id';
    // public $incrementing = false;

    protected $dates = ['deleted_at'];
    
    public $fillable = [
        'id',
        'invoice_kategori_id',
        'kode_invoice',
        'tanggal_invoice',
        'nama_order',
        'deskripsi',
        'nama_pembeli',
        'email_pembeli',
        'no_telp_pembeli',
        'user_id',
        'discount',
        'total',
        'tax',
        'payment_metode',
        'status',
    ];
}
