<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Cooperation extends Model
{
    use SoftDeletes;

    public $table = 'cooperation';
    protected $primaryKey = 'id';
    public $incrementing = false;
    
    protected $dates = ['deleted_at'];

    public $fillable = [
        'id',
        'kode_corporate',
        'nama',
        'jabatan',
        'email',
        'nama_perusahaan',
        'slug',
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
        'ttd_1',
        'ttd_2',
    ];
    public function kota()
    {
        return $this->belongsTo(\App\Models\KabupatenKota::class, 'kab_kota');
    }
    public function provinsis()
    {
        return $this->belongsTo(\App\Models\Provinsi::class, 'provinsi');
    }
}
