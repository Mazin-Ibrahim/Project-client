<?php

namespace App\Http\Controllers;
use App\Area;
use App\Client;
use App\Device;
use App\ClientMaintenance;
use App\Maintenance;
use App\Tecnical;
use App\Town;

use Illuminate\Http\Request;

class CountController extends Controller
{
    

    public function control(){
         
        $areas = Area::where('is_deleted',0)->count();
        $clients = Client::where('is_deleted',0)->count();
        $cms = ClientMaintenance::where('is_deleted',0)->count();
        $devices = Device::where('is_deleted',0)->count();
        $maintenances = Maintenance::where('is_deleted',0)->count();
        $tecnicals = Tecnical::where('is_deleted',0)->count();
        $towns = Town::where('is_deleted',0)->count();

        return view('control.control',compact('areas','clients','cms','devices','maintenances','tecnicals','towns'));


    }
}
