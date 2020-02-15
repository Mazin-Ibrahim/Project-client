<?php

namespace App\Http\Controllers;
use App\Town;
use App\Area;
use App\ClientMaintenance;
use App\Device;
use App\Client;
use Session;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests\ClientRequest;

class ClientController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

   

    public function index()
    {
        $clients = Client::where('is_deleted',0)->paginate(9);
        $clientsCount = Client::where('is_deleted',0)->count();
        $clientsCountTurnOn = Client::where('is_deleted',0)->where('ch',1)->count();
        $clientsCountTurnOf = Client::where('is_deleted',0)->where('ch',2)->count();
        // dd($clients);

        return view('client.index')->withClients($clients)->
        withClientsCount($clientsCount)->
        withClientsCountTurnOn($clientsCountTurnOn)->
        withClientsCountTurnOf($clientsCountTurnOf);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $areas = Area::where('is_deleted',0)->get();
        $devices = Device::where('is_deleted',0)->get();
        return view('client.create')->withAreas($areas)->withDevices($devices);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ClientRequest $request)
    {
       $code = $request->area_id  . '-' .rand();

        $client = new Client();
        $client->name = $request->name;
        $client->code = $code;
        $client->password = Hash::make($request->passsword);
        $client->area_id = $request->area_id;
        $client->town_id = $request->town_id;
        $client->address = $request->address;
        $client->device_id = $request->device_id;
        $client->note = $request->note;
        $client->phone1 = $request->phone1;
        $client->phone2 = $request->phone2;
        $client->phone3 = $request->phone3;
        $client->date = $request->date;
        $client->days = $request->days;
        $client->ch = $request->ch;
        $client->save();

        $cm =  new ClientMaintenance();
        $cm->code = $code;
        $cm->client_id   = $client->id;
        $cm->done = 1;
        $cm->date = $request->date;
        $cm->save();
        // notify()->success('تم الحفظ ⚡️');
        Session::flash('success','تم حفظ البيانات');
        return redirect()->route('clients.index');
        
         
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $client = Client::findOrFail($id);

        return view('client.show')->withClient($client);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $client = Client::findOrFail($id);
        $areas = Area::where('is_deleted',0)->get();
        $devices = Device::where('is_deleted',0)->get();
        return view('client.edit')->withClient($client)->withAreas($areas)->withDevices($devices);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(ClientRequest $request, $id)
    {
        $client = Client::findOrFail($id);
        $client->update($request->all());
        Session::flash('success','تم تعديل البيانات');
        return redirect()->route('clients.index');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function clientClear($id)
    {
        $client = Client::findOrFail($id);
        $client->is_deleted = 1;

        $client->save();
        Session::flash('success','تم الحذف');
        return redirect()->route('clients.index');
    }

    public function getTown($id){

       $town = Town::where('area_id',$id)->get();

       return json_encode($town);
    }

    public function ClientJson(){

        $clients = Client::with('area','town','device')->where('is_deleted',0)->paginate(9);

        return $clients;
    }

    public function getClients($id){
        $clients = Client::with('device')->with('area')->with('town')->where('area_id',$id)->where('is_deleted',0)->paginate(1000);
        return $clients ? $clients : [];
    }

    public function allClients(){
        $allClients = Client::with('device')->with('area')->with('town')->where('is_deleted',0)->paginate(1000);
        return $allClients ? $allClients : [];
    }
}
