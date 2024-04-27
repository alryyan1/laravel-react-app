<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginRequest;
use App\Http\Requests\SignUpRequest;
use App\Models\User;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function signup(SignUpRequest $request){
        $data = $request->validated();
        $user =  User::create(['username'=>$data['username'],'password'=>bcrypt($data['password'])]);
        $token =      $user->createToken('main')->plainTextToken;
        return ['status'=>true,'user'=>$user , 'token'=>$token];

    }
    public function login(LoginRequest $request){
//        return $request->all();
        $data=  $request->validated();
        if (!\Auth::attempt($data)){
            return response(['message'=>'password or user is wrong'],401);
        }
        $user =  \Auth::user();
        return  ['status'=>true,'user'=>$user,'token'=>$user->createToken('main')->plainTextToken];
    }
    public function logout(Request $request){
        /** @var User $user */
       $user =  $request->user();

       $user->currentAccessToken()->delete();
       return response('',204);

    }
}
