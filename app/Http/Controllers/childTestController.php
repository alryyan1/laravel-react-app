<?php

namespace App\Http\Controllers;

use App\Models\ChildTest;
use App\Models\MainTest;
use Illuminate\Http\Request;

class childTestController extends Controller
{
    public function destroy(Request $request , ChildTest $childTest){

        return ['status'=>$childTest->delete()];
    }
    public function store(Request $request , MainTest $main_test){
        $child_test = new ChildTest();
        $child_test->child_test_name = 'new';
      $child =   $main_test->childTests()->save($child_test);
      return ['status' => true , 'child'=>$child->fresh()];
    }
    public  function editChildGroup(Request $request , ChildTest $childTest){
        $childTest->update(['child_group_id'=>$request->id]);
        return ['status'=>true];
    }
}
