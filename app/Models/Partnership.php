<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Partnership extends Model
{
    use SoftDeletes;

    public $table = 'partnership';
    protected $primaryKey = 'id';
    public $incrementing = false;
    
    protected $dates = ['deleted_at'];

    public $fillable = [
        'id',
        'slug',
        'nama_partner',
        'penanggung_jawab',
        'alamat',
        'file',
        'ttd1',
        'ttd2',
    ];
}
