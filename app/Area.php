<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Area extends Model
{
    protected $guarded = [];

    public function town(){
        return $this->hasMany('App\Town');
    }

    public function client(){
        return $this->hasMany('App\Client');
    }

    
}
