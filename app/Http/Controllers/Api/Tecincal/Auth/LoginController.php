<?php

namespace App\Http\Controllers\Api\Tecincal\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Validator;
use JWTFactory;
use JWTAuth;
use JWTAuthException;
use App\Tecnical;

use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
        public function __construct()
    {
        $this->tecnical = new Tecnical;
    }
    
    public function login(Request $request)
    {

        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'password'=> 'required'
        ]);
        if ($validator->fails()) {
            return response()->json($validator->errors());
        }
        config()->set( 'auth.defaults.guard', 'tecnical-api' );
        \Config::set('jwt.user', 'App\Tecnical'); 
		\Config::set('auth.providers.users.model', \App\Tecnical::class);
		$credentials = $request->only('name', 'password');
         
		$token = null;
        try {
            if (! $token = JWTAuth::attempt($credentials)) {
                return response()->json(['error' => 'invalid_credentials'], 401);
            }
        } catch (JWTException $e) {
            return response()->json(['error' => 'could_not_create_token'], 500);
        }
                // user = JWTAuth::toUser($token);
//                 $user = Auth::user();
      return response()->json(compact('token'));
    }


}