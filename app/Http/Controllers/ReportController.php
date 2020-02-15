<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\ClientMaintenance; 
use App\Town;
use App\Area;

class ReportController extends Controller
{

    

    public function showClientMaintenanceDate(){

        return view('report.date.create');
    }

    public function getClientMaintenanceDate(Request $request){
        $from = $request->from;
        $to = $request->to;

        $cms = ClientMaintenance::whereBetween('date',[$from,$to])->paginate(9);
        return view('report.date.index')->withCms($cms);
    }

    public function ControlReport(){
        
        return view('control.report');
    }

    public function showClientTown(){
        $towns = Town::where('is_deleted',0)->get();
        return view('report.town.create')->withTowns($towns);
    }

    public function getClientTown(Request $request){
        
        $town = Town::findOrFail($request->town_id);
        $clients = $town->client()->where('town_id',$town->id)->where('is_deleted',0)->paginate(9);

       return view('report.town.index')->withClients($clients);
        

    }

    public function showClientArea(){
        $areas = Area::where('is_deleted',0)->get();
        return view('report.area.create')->withAreas($areas);
    }

    public function getClientArea(Request $request){
        
        $area = Area::findOrFail($request->area_id);
        $clients = $area->client()->where('area_id',$area->id)->where('is_deleted',0)->paginate(9);
        return view('report.area.index')->withClients($clients);
        

    }

    public function showMainDone(){

        return view('report.main_done.create');
    }

    public function getMainDone(Request $request){
        $from = $request->from;
        $to = $request->to;

        $cms = ClientMaintenance::whereBetween('date',[$from,$to])->where('done',2)->paginate();
        return view('report.main_done.index')->withCms($cms);
    }

    public function showMainNot(){

        return view('report.main_not.create');
    }

    public function getMainNot(Request $request){
        $from = $request->from;
        $to = $request->to;

        $cms = ClientMaintenance::whereBetween('date',[$from,$to])->where('done',1)->paginate(9);
        return view('report.main_not.index')->withCms($cms);
    }
}
