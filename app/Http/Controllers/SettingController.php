<?php

namespace App\Http\Controllers;

use App\Models\Setting;
use App\Models\UserSetting;
use Hamcrest\Core\Set;
use Illuminate\Http\Request;

class SettingController extends Controller
{
    public function update(Request $request){
       $data =  $request->all();
      $rows  =   Setting::all()->count();
      if ($rows ==  0 ){
          Setting::create();
      }

      return ['result'=> Setting::all()->first()->update([$data['colName']=>$data['data']])];
    }
    public function index(Request $request){

        return  Setting::all()->first();
    }
    public function userSettings(Request $request){

        return UserSetting::where('user_id','=',auth()->user()->id)->first();
    }

    public function updateUserSettings(Request $request){
        $data =  $request->all();
        $rows  =   UserSetting::where('user_id','=',auth()->user()->id)->count();
        if ($rows ==  0 ){
            UserSetting::create(['user_id'=>auth()->user()->id]);
        }
        $userSettings = UserSetting::where('user_id','=',auth()->user()->id)->first();

        return ['result'=> $userSettings->update([$data['colName']=>$data['data']]),'userSettings'=>$userSettings->fresh()];
    }
}
