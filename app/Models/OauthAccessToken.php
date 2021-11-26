<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class OauthAccessToken extends Model
{
    public function AauthAcessToken(){
        return $this->hasMany('\App\OauthAccessToken');
    }
}
