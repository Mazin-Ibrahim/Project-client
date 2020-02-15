<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Client;
use App\Town;
use App\Area;

class ClientTaskController extends Controller
{

    

    public function searchClientArea(Request $request){
        
        $clients = Client::where('area_id',$request->area_id)->paginate(9);
        return view('client.search')->withClients($clients);

    }

    public function areaTown($id){
        $towns = Town::where('area_id',$id)->get();

        return ['towns'=> $towns] ;
    }
}
