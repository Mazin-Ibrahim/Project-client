<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests\TecnicalRequest;
use App\Tecnical;
use Session;

class TecnicalController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

   

    public function index()
    {
        $tecnicals = Tecnical::where('is_deleted',0)->paginate(9);

        return view('tecnical.index')->withTecnicals($tecnicals);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('tecnical.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(TecnicalRequest $request)
    {
        $tecnical = new Tecnical();
        $tecnical->name = $request->name;
        $tecnical->status = $request->status;
        $tecnical->password = Hash::make($request->passsword);
        $tecnical->save();
        // notify()->success('تم الحفظ ⚡️');
        Session::flash('success','تم حفظ البيانات');
        return redirect()->route('tecnicals.index');
        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    { 
        $tecnical = Tecnical::findOrFail($id);
        return view('tecnical.edit')->withTecnical($tecnical);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(TecnicalRequest $request, $id)
    {
        $tecnical = Tecnical::findOrFail($id);
        $tecnical->update($request->all());
        notify()->success('تم التحرير ⚡️');
        return redirect()->route('tecnicals.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $tecnical = Tecnical::findOrFail($id);

        $tecnical->is_deleted = 1;

        $tecnical->save();
        // notify()->success('تم الحذف ⚡️');
        Session::flash('success','تم حذف البيانات');
        return redirect()->route('tecnicals.index');
    }
}
