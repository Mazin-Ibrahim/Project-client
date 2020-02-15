<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Tymon\JWTAuth\Contracts\JWTSubject;
use Illuminate\Notifications\Notifiable;

class Tecnical extends Authenticatable implements JWTSubject
{
    use Notifiable;
    protected $guarded = [];
    protected $guard = 'tecnical-api';

    public function stauts(){

        if($this->status == 0){
            return "نشط";
        }

        return "مغلق";
    }

    public function maint(){
        return $this->hasMany('App\ClientMaintenance');
    }

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
}
