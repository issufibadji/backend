<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use PHPOpenSourceSaver\JWTAuth\Contracts\JWTSubject;


class Usuario extends Authenticatable implements JWTSubject
{
    use HasFactory, Notifiable;


    protected $primaryKey = "USUA_ID";

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'USUA_NM',
        'USUA_CD_CPF',
        'USUA_RG',
        'USUA_PROF',
        'USUA_NACIO',
        'USUA_ES_CIVIL',
        'USUA_TX_EMAIL',
        'USUA_TX_SENHA',
    ];
    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
       'USUA_TX_SENHA' ,
       'remember_token',

    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'USUA_TX_EMAIL_VERIFICACAO_AT' => 'datetime',
        'USUA_TX_SENHA' => 'hashed',

    ];

    /**
     * Always encrypt password when it is updated.
     *
     * @param $value
     * @return string
     */
    // public function setPasswordAttribute($value)
    // {
    //     $this->attributes['USUA_TX_SENHA'] = bcrypt($value);
    // }

  /**
     * Get the identifier that will be stored in the subject claim of the JWT.
     *
     * @return mixed
     */
    public function getJWTIdentifier()
    {
        return $this->getKey();
    }

    /**
     * Return a key value array, containing any custom claims to be added to the JWT.
     *
     * @return array
     */
    public function getJWTCustomClaims()
    {
        return [];
    }

    public function getAuthPassword()
    {

        return $this->USUA_TX_SENHA;
    }

}
