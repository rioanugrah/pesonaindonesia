<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Passport\HasApiTokens;
use Spatie\Permission\Traits\HasRoles;

class User extends Authenticatable implements MustVerifyEmail
{
    use HasApiTokens, Notifiable, HasRoles;
    // protected $primaryKey = 'id';
    // public $incrementing = false;
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'id','generate','name', 'email', 'password','email_verified_at', 'socialite_id', 'socialite_name', 'profile', 'role', 'id_unique','device_token'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token', 'api_token','id','id_unique'
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    // public function roles()
    // {
    //     return $this->belongsTo(\App\Models\Roles::class, 'role');
    // }

    // public function AauthAcessToken(){
    //     return $this->hasMany('\App\OauthAccessToken');
    // }
}
