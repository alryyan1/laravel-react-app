<?php

namespace App\Http\Controllers;

use App\Models\Setting;
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
}
