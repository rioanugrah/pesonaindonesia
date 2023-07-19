<?php

namespace App\Models\v2;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class InvoiceKategori extends Model
{
    use SoftDeletes;
    public $table = 'invoice_kategori';
    // protected $primaryKey = 'id';
    // public $incrementing = false;

    protected $dates = ['deleted_at'];
    
    public $fillable = [
        'id',
        'kode_invoice',
        'kategori_invoice',
    ];
}
