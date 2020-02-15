<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\ClientMaintenance;

class ClientMainController extends Controller
{
    public function clientMainByDateAndTecnical(){

        $clientMaintenances = ClientMaintenance::with('tecnical')->get();
        

        return response()->json($clientMaintenances,200);
    }


    public function clientMainByDateAndClient(){

        $clientMaintenances = ClientMaintenance::with('client')->get();
        

        return response()->json($clientMaintenances,200);
    }
}
