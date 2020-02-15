<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    protected $guarded = [];
    
    public function device(){
        return $this->belongsTo('App\Device');
    }

    public function area(){
        return $this->belongsTo('App\Area');
    }

    public function town(){
        return $this->belongsTo('App\Town');
    }

    public function clientCain(){
        return $this->hasMany('App\ClientMaintenance');
    }

    public function notice(){
        return $this->hasMany('App\Notice');
    }

    public function ch(){

        if($this->ch == 1){
            return "نشط";
        }
        return "معطل";
    }
}
