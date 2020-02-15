<?php

namespace App\Http\Controllers;
use App\Http\Requests\AreaRequest;
use Illuminate\Http\Request;
use App\Area;
use App\Town;
use Session;

class AreaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    


    public function index()
    {
        $areas = Area::where('is_deleted',0)->paginate(9);
    

        return view('area.index')->withAreas($areas);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('area.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(AreaRequest $request)
    {
        Area::create($request->all());
        // notify()->success('تم الحفظ ⚡️');
        Session::flash('success','تم حفظ البيانات');
        return redirect()->route('areas.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
         
        $area = Area::findOrFail($id);
        $towns = $area->town()->where('area_id',$area->id)->get();
        
        return view('area.show')->withArea($area)->withTowns($towns);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $area = Area::findOrFail($id);
        return view('area.edit')->withArea($area);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(AreaRequest $request, $id)
    {
        $area = Area::findOrFail($id);
        $area->update($request->all());
        // notify()->success('تم التحرير ⚡️');
        Session::flash('success','تم تعديل البيانات');
        return redirect()->route('areas.index');
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $area = Area::findOrFail($id);
        $area->is_deleted = 1;

        $area->save();
        // notify()->success('تم الحذف ⚡️');
        Session::flash('success','تم حذف البيانات');
        return redirect()->route('areas.index');
    }

    public function getAreas(){
        return Area::where('is_deleted',0)->get();
    }

    public function getTowns($id){
        $towns = Town::where('area_id',$id)->where('is_deleted',0)->paginate(9);
        return $towns ? $towns : [];
    }

    public function allTowns(){
        return Town::with('area')->where('is_deleted',0)->paginate(9);
    }
}
