<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class TransactionLists extends Model
{
    use SoftDeletes;

    public $table = 'transaction_list';
    protected $dates = ['deleted_at'];

    public $fillable = [
        'id',
        'transaction_id',
        'transaction_order',
        'qty',
    ];
}
