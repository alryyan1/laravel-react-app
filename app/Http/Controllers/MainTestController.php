<?php

namespace App\Http\Controllers;

use App\Models\MainTest;
use Illuminate\Http\Request;

class MainTestController extends Controller
{
    public function show(){
       return MainTest::with('childTests','childTests.unit')->get();
    }


    public function updateChildTest(Request $request,MainTest $mainTest)
    {
        $child_id = $request->get('child_id');
        $data = $request->all();
        $mainTest->childTests()->where('id',$child_id)->update([$data['colName'] => $data['val']]);
    }
}
