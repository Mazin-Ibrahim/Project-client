<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Notice;
use App\Http\Requests\NoticeRequest;

class NoticeController extends Controller
{
    public function storeNotice(NoticeRequest $request){

        $notice = new Notice();
        $notice->client_id = $request->client_id;
        $notice->date = $request->date;
        $notice->content = $request->content;
        $notice->status = 2;

        $notice->save();

        return response()->json($notice,200);
    }
}
