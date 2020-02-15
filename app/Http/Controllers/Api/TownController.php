<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Town;

class TownController extends Controller
{
    public function towns(){

        $towns = Town::all();

        return response()->json(['get all towns',$towns],200);
    }
}
