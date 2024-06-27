<?php

namespace App\Http\Controllers;

use App\Models\MainTest;
use App\Models\Package;
use Illuminate\Http\Request;

class MainTestController extends Controller
{
    public function chemistry(){
       return Package::with('tests')->find(2);
    }
    public function show(){
       return MainTest::with('childTests','childTests.unit')->get();
    }
    public function getbyid(Request $request , $id){
        return MainTest::with('childTests','childTests.unit')->find($id);
    }
    public function destroy(Request $request , MainTest $mainTest){
        return ['status' => $mainTest->delete()];
    }
    public function update(Request $request , MainTest $mainTest){
        $data = $request->all();
//        return $data;

        return ['status' => $mainTest->update([$data['colName'] => $data['val']])];
    }
    public function updateChildTest(Request $request,MainTest $mainTest)
    {
        $child_id = $request->get('child_id');
        $data = $request->all();
        $mainTest->childTests()->where('id',$child_id)->update([$data['colName'] => $data['val']]);
    }
}
