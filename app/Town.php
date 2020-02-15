<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Town extends Model
{
    protected $guarded = [];

    public function area(){

        return $this->belongsTo('App\Area');
    }

    public function client(){
        return $this->hasMany('App\Client');
    }

    public function maint(){
        return $this->hasMany('App\ClientMaintenance');
    }
}
