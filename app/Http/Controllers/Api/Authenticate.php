<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Http\Resources\UserResource;
use Illuminate\Support\Facades\Auth;
 
class Authenticate extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function login(Request $request)
    {
        $request = $request->validate([ 'email'=>'string|required', 'password'=>'string|required' ]);

        if(!Auth::attempt($request)){
            return response()->json(['message'=>"no"]);
        }
        $token = auth()->user()->createToken('login')->accessToken;
        return response()->json(['token'=>$token]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function logout(Request $request)
    {
        auth()->user()->token()->revoke();
        return response()->json([
            'message' => 'Logged out'
        ]);
    }


    public function me(){
        return response()->json([
            'message' => new UserResource(auth()->user())
        ]); 
    }

}
