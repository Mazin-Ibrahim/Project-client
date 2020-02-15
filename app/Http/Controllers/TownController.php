<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\TownRequest;
use App\Town;
use App\Area;
use Session;

class TownController extends Controller
{
    /** 
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */


    public function index()
    {
        $towns = Town::with('area')->where('is_deleted',0)->paginate(9);
        $areas = Area::where('is_deleted',0)->get();
        return view('town.index')->withTowns($towns)->withAreas($areas);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $areas = Area::where('is_deleted',0)->get();

        return view('town.create')->withAreas($areas);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(TownRequest $request)
    {
        Town::create($request->all());
        // notify()->success('تم الحفظ ⚡️');
        Session::flash('success','تم حفظ البيانات');
        return redirect()->route('towns.index');
        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $town  = Town::findOrFail($id);
        return view('town.show')->withTown($town);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $areas = Area::all();
        $town  = Town::findOrFail($id);
    
        return view('town.edit')->withAreas($areas)->withTown($town);
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
        $town = Town::findOrFail($id);
        $town->update($request->all());
        // notify()->success('تم التحرير ⚡️');
        Session::flash('success','تم تعديل البيانات');
        return redirect()->route('towns.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    // public function destroy($id)
    // {
    //     $town  = Town::findOrFail($id);

    //     $town->is_deleted = 1;

    //     $town->save();
    //     Session::flash('success','تم الحذف');
    //     return true;
    // }

    public function TownDelete($id)
    {
        $town  = Town::findOrFail($id);

        $town->is_deleted = 1;

        $town->save();
        // notify()->success('تم الحذف ⚡️');
        Session::flash('success','تم حذف البيانات');
        return redirect()->route('towns.index');
    }

}
