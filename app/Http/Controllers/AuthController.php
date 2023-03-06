<?php

namespace App\Http\Controllers;

use App\Http\Requests\V1\User\RegisterRequest;
use App\Http\Resources\User\UserResource;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function register(RegisterRequest $request){
        $user = new User();
        $user->name = $request->input('name');
        $user->email = $request->input('email');
        $user->password =  Hash::make($request->input('password'));
        $user->whatsapp = $request->input('whatsapp');
        $user->assignRole('client');
        $user->save();
        return (new UserResource($user))->additional([
                'msg'=>[
                    'summary' => 'Register success',
                    'detail' => '',
                    'code' => '200'
                ]
            ]
        )->response()->setStatusCode(200);
    }

    public function login(Request $request){
        if(!Auth::attempt($request->only('email','password'))){
            return response([
                'message'=>'invalid credentials!'
            ], 404);
        }
        $user =Auth::user();
        $token = $user->createToken('token')->plainTextToken;

        return (new UserResource($user))->additional([
            'token'=>$token,
            'msg'=>[
                'summary' => 'Login success',
                'detail' => '',
                'code' => '200'
            ]
        ])->response()->setStatusCode(200);
    }

    public function logout(){
        auth()->user()->tokens()->delete();
        return response([
            'message'=>'Success logout'
        ]);
    }
}
