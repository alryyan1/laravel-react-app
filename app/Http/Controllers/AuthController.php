<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginRequest;
use App\Http\Requests\SignUpRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;

class AuthController extends Controller
{
    public function signup(SignUpRequest $request){
        $data = $request->validated();
        $user =  User::create(['username'=>$data['username'],'password'=>bcrypt($data['password']),'doctor_id'=>$data['doctor_id'] ?? null]);
        $user->load(['roles','routes']);
        $token =      $user->createToken('main')->plainTextToken;
        return ['status'=>true,'user'=>$user->load('sub_routes') , 'token'=>$token];

    }
    public function login(\App\Http\Requests\Auth\LoginRequest $request){
//        return $request->all();
        $data=  $request->validated();
        if (!\Auth::attempt($data)){
            return response(['message'=>'password or user is wrong'],401);
        }
        $user =  \Auth::user();
        $token =$user->createToken('main');
//        DB::table('personal_access_tokens')->where('tokenable_id',$user->id)
//            ->update(['expires_at'=>Carbon::now()->addHour()]);

//        $request->authenticate();
//
//        $request->session()->regenerate();
        return  ['status'=>true,'user'=>$user,'token'=>$token->plainTextToken];
    }
    public function logout(Request $request){
        /** @var User $user */
       $user =  $request->user();
       $user->tokens()->delete();

//       $user->currentAccessToken()->delete();
       return response('',204);

    }
}
