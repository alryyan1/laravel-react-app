<?php

namespace App\Http\Controllers;

use App\Models\Country;
use Illuminate\Http\Request;

class CountryController extends Controller
{
    public function index(){
        return Country::all();
    }

    public function store(Request $request){
        return ['status'=>true,'data'=>Country::create($request->all())];
    }
}
