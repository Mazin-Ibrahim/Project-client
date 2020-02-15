<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Notice extends Model
{
    protected $guarded = [];
    
    public function client(){
        return $this->belongsTo('App\Client');
    }

    public function status(){

        if($this->status == 1){
            return "تم";
        }

        return "لم يتم";
    }
}
