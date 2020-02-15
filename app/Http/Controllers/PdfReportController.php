<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\ClientMaintenance;
use App\Town;
use App\Client;
use App\Area;
use PDF;

class PdfReportController extends Controller
{

    

    public function byDataPrint(){

     $cms = ClientMaintenance::where('is_deleted',0)->get();


     $pdf = PDF::loadView('pdf.byDate', compact('cms'));

     

     
     $pdf->save(storage_path().'\report\صيانات العملاء بالفترة.pdf');

     return $pdf->download('_صيانات العملاء بالفترة.pdf');
    }

    public function byMainDonePrint(){

        $cms = ClientMaintenance::where('done',2)->where('is_deleted',0)->get();
        
        
        $pdf = PDF::loadView('pdf.MainDone', compact('cms'));
   
        
        
        $pdf->save(storage_path().'\report\ صيانات العملاء بالفتره التي تم.pdf');
   
        return $pdf->download('صيانات العملاء بالفتره التي تم.pdf');
       }

       public function byMainNotPrint(){

        $cms = ClientMaintenance::where('done',1)->where('is_deleted',0)->get();
        
        
        $pdf = PDF::loadView('pdf.MainNot', compact('cms'));
   
        
        
        $pdf->save(storage_path().'\report\ صيانات العملاء بالفتره التي لم تتم.pdf');
   
        return $pdf->download('صيانات العملاء بالفتره التي لم تتم.pdf');
       }


       public function allClientTownPrint($id){
         
        $town = Town::findOrFail($id);
        
        $clients = $town->client()->where('town_id',$town->id)->where('is_deleted',0)->get();
        
         
        $pdf = PDF::loadView('pdf.allClientTown', compact('clients'));
   
        
        
        $pdf->save(storage_path().'\report\  جميع العملاء حسب الحي.pdf');
   
        return $pdf->download('جميع العملاء حسب الحي.pdf');
       }

       public function allClientAreaPrint($id){

        $area = Area::findOrFail($id);
        $clients = $area->client()->where('area_id',$area->id)->where('is_deleted',0)->get();
        // dd($clients);
         
        $pdf = PDF::loadView('pdf.allClientArea', compact('clients'));
   
        
        
        $pdf->save(storage_path().'\report\ جميع العملاء حسب المنطقه.pdf');
   
        return $pdf->download('جميع العملاء حسب المنطقه.pdf');
       }


       public function allClientPrint(){

        
        $clients =Client::where('is_deleted',0)->get();
        // dd($clients);
         
        $pdf = PDF::loadView('pdf.allClient', compact('clients'));
   
        
        
        $pdf->save(storage_path().'\report\جميع العملاء.pdf');
   
        return $pdf->download('جميع العملاء.pdf');
       }

       


       


       
    
}
