<?php

namespace App\Http\Controllers;

use App\Models\ChildTest;
use App\Models\ChildTestOption;
use Illuminate\Http\Request;

class ChildOptionController extends Controller
{
    public function destroy(Request $request , ChildTestOption $childTestOption){
        $childTestOption->delete();
        return ['status'=>true];
    }
    public function store(Request $request,ChildTest $childTest){
          $childTest->options()->create(['name'=>'NEW!']);
          return ['status'=>true];

    }
    public function update(Request $request , ChildTestOption $childTestOption){
        $val = $request->get('val');
       $childTestOption->update(['name'=>$val]);
        return ['status'=>true];
    }
    public function all(Request $request ,ChildTest $childTest)
    {
        return  $childTest->options;
    }
}
