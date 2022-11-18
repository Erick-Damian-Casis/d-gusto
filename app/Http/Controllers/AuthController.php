<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function register(Request $request){
        $user = new User();
        $user->name = $request->input('name');
        $user->email = $request->input('email');
        $user->password =  Hash::make($request->input('password'));
        $user->whatsapp = $request->input('whatsapp');
        $user->save();
        return $user;
    }

    public function login(Request $request){
        if(!Auth::attempt($request->only('email','password'))){
            return response([
                'message'=>'invalid credentials!'
            ], 404);
        }

        $user =Auth::user();
        $token= $user->createToken('token')->plainTextToken;
        return response([
            'message'=>'success!',
            'token'=>$token
        ]);
    }

    public function user(){
        return Auth::user();
    }

    public function logout(){
        auth()->user()->tokens()->delete();
        return response([
            'message'=>'success!'
        ]);
    }
}
