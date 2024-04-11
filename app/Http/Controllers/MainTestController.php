<?php

namespace App\Http\Controllers;

use App\Models\MainTest;
use Illuminate\Http\Request;

class MainTestController extends Controller
{
    public function show(){
       return MainTest::all();
    }
}
