<?php

namespace App\Models\PlesiranMalang;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Tour extends Model
{
    use SoftDeletes;

    protected $connection= 'plesiran_malang';
    
    public $table = 'tour';
    protected $primaryKey = 'id';
    public $incrementing = false;

    protected $dates = ['deleted_at'];

    public $fillable = [
        'id',
        'slug',
        'nama_tour',
        'deskripsi',
        'durasi',
        'grup',
        'umur',
        'lokasi',
        'jam_mulai',
        'harga',
    ];
}
