<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class KabupatenKota extends Model
{
    use SoftDeletes;

    public $table = 'kota_kabupaten';

    protected $dates = ['deleted_at'];

    public $fillable = [
        'id',
        'id_provinsi',
        'nama',
    ];

    public function provinsi()
    {
        return $this->belongsTo(\App\Models\Provinsi::class, 'id_provinsi');
    }
}
