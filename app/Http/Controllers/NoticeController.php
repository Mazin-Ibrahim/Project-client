<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Notice;
use App\Client;
use App\Http\Requests\NoticeRequest;
use Session;

class NoticeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $notices = Notice::where('is_deleted',0)->get();

        return view('notice.index')->withNotices($notices);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    { 
        $clients = Client::where('is_deleted',0)->get();
        return view('notice.create')->withClients($clients);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(NoticeRequest $request)
    {
        $notice = new Notice();
        $notice->client_id = $request->client_id;
        $notice->date = $request->date;
        $notice->content = $request->content;
        $notice->status = 2;

        $notice->save();
        Session::flash('success','تم حفظ البيانات');
        return redirect()->route('notices.index');
        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $notice = Notice::findOrFail($id);
        return view('notice.show')->withNotice($notice);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $notice = Notice::findOrFail($id);
        return view('notice.edit')->withNotice($notice);
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
        $notice = Notice::findOrFail($id);
        $notice->update($request->all());
        // notify()->success('تم المعالجة ⚡️');
        Session::flash('success','تم تعديل البيانات');
        return redirect()->route('notices.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $notice = Notice::findOrFail($id);
        $notice->is_deleted = 1;

        $notice->save();
        Session::flash('success','تم حذف البيانات');
        // notify()->success('تم الحذف ⚡️');
        return redirect()->route('notices.index');
    }
}
