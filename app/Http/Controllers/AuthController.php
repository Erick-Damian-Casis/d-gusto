<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function register(Request $request){
        $user = new User();
        $user->name = $request->input('name');
        $user->email = $request->input('email');
        $user->password =  Hash::make($request->input('password'));
        $user->whatsapp = $request->input('whatsapp');
        $user->assignRole('client');
        $user->save();
        return response([
            'message'=>'Success Register'
        ], 404);
    }

    public function login(Request $request){
        if(!Auth::attempt($request->only('email','password'))){
            return response([
                'message'=>'invalid credentials!'
            ], 404);
        }
        $user =Auth::user();
        $user->hasRole('');
        $token= $user->createToken('token')->plainTextToken;
        return response()->json([
            "token"=>$token,
            "user"=>$user->name,
        ]);
    }

    public function logout(){
        auth()->user()->tokens()->delete();
        return response([
            'message'=>'Success logout'
        ]);
    }
}
