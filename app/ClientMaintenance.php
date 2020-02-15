<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ClientMaintenance extends Model
{
    protected $guarded = [];
    
    public function town(){
        return $this->belongsTo('App\Town');
    }
 
    public function maintenance(){
        return $this->belongsTo('App\Maintenance');
    }

    public function tecnical(){
        return $this->belongsTo('App\tecnical'); 
    }

    public function client(){
        return $this->belongsTo('App\Client');
    }

    public function done(){
        if($this->done == 1){
            return "مؤجلة";
        }

        return "تمت";
    }
}
