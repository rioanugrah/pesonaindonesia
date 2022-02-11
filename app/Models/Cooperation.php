<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Cooperation extends Model
{
    use SoftDeletes;

    public $table = 'cooperation';
    protected $primaryKey = 'id';

    protected $dates = ['deleted_at'];

    public $fillable = [
        'id',
        'nama',
        'email',
        'nama_perusahaan',
        'logo_perusahaan',
        'kategori',
        'alamat_perusahaan',
        'kab_kota',
        'provinsi',
        'kode_pos',
        'negara',
        'telp_kantor',
        'telp_selular',
        'no_fax',
        'status',
        'berkas',
    ];
}
