<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Perusahaan extends Model
{
    use SoftDeletes;
    
    public $table = 'perusahaan';
    protected $dates = ['deleted_at'];
    protected $primaryKey = 'id';
    public $incrementing = false;
    
    public $fillable = [
        'id',
        'nama_perusahaan',
        'alamat_perusahaan',
        'penanggung_jawab',
        'jabatan',
        'status',
        'siup',
        'npwp',
    ];

    public function roles()
    {
        return $this->belongsTo(\App\Models\Roles::class, 'jabatan');
    }
}
