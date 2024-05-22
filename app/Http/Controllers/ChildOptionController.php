<?php

namespace App\Http\Controllers;

use App\Models\ChildTest;
use App\Models\ChildTestOption;
use Illuminate\Http\Request;

class ChildOptionController extends Controller
{
    public function store(Request $request,ChildTest $childTest){
          $childTest->options()->create(['name'=>'NEW!']);
          return ['status'=>true];

    }
    public function all(Request $request ,ChildTest $childTest)
    {
        return  $childTest->options;
    }
}
