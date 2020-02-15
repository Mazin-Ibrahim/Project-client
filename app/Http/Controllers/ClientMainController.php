<?php

namespace App\Http\Controllers;
use App\Http\Requests\ClientMainRequest;
use Illuminate\Http\Request;
use App\Tecnical;
use App\Town;
use App\Maintenance;
use App\ClientMaintenance;
use App\Client;
use Session;

class ClientMainController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    

    public function index()
    {
        $cms = ClientMaintenance::where('is_deleted',0)->latest()->paginate(9);
        

        return view('cm.index')->withCms($cms);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $tecnicals = Tecnical::where('is_deleted',0)->get();
        $clients = Client::where('is_deleted',0)->get();
        $maintenances = Maintenance::where('is_deleted',0)->get();

        return view('cm.create')->withTecnicals($tecnicals)->withMaintenances($maintenances)->withClients($clients);

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ClientMainRequest $request)
    {
        $client = Client::where('is_deleted',0)->where('id',$request->client_id)->first();
        $end_cost = $request->amm - $request->disc_amm;
        $cm = new ClientMaintenance();
        $cm->client_id = $request->client_id;
        $cm->code      = $client->code;
        $cm->date      = $request->date;
        $cm->status    =  $request->status;
        $cm->maintenance_id = $request->maintenance_id;
        $cm->note           =  $request->note;
        $cm->amm = $request->amm;
        $cm->done = $request->done;
        $cm->disc_amm = $request->disc_amm;
        $cm->tecnical_id = $request->tecnical_id;
        $cm->end_cost = $end_cost;
         
        $cm->save();
        // notify()->success('تم الحفظ ⚡️');
        Session::flash('success','تم حفظ البيانات');
        return redirect()->route('ClientMains.index');
        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $cm = ClientMaintenance::findOrFail($id);
        return view('cm.show')->withCm($cm);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $cm = ClientMaintenance::findOrFail($id);
        $tecnicals = Tecnical::where('is_deleted',0)->get();
        $maintenances = Maintenance::where('is_deleted',0)->get();
        return view('cm.edit')->withTecnicals($tecnicals)
        ->withMaintenances($maintenances)
        ->withCm($cm);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    { 
        
        $end_cost = $request->amm - $request->disc_amm;

        $cm = ClientMaintenance::findOrFail($id);

        $cm->date = $request->date;
        $cm->status = $request->status;
        // $cm->code   = $request->code;
        $cm->maintenance_id = $request->maintenance_id;
        $cm->note = $request->note;
        $cm->amm = $request->amm;
        $cm->done = $request->done;
        $cm->disc_amm = $request->disc_amm;
        $cm->tecnical_id = $request->tecnical_id;
        $cm->end_cost = $end_cost;
        $cm->save();
        // dd($cm);
        // notify()->success('تم التحرير ⚡️');
        Session::flash('success','تم التعديل البيانات');
        return redirect()->route('ClientMains.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $cm = ClientMaintenance::findOrFail($id);
        $cm->is_deleted = 1;

        $cm->save();
        // notify()->success('تم الحذف ⚡️');
        Session::flash('success','تم حذف البيانات');
        return redirect()->route('ClientMains.index');
    }
}
