<?php

namespace App\Http\Controllers;

use App\Models\ChildTest;
use App\Models\MainTest;
use App\Models\Package;
use Illuminate\Http\Request;

class MainTestController extends Controller
{
    public function store(Request $request)
    {
        $child_test = new ChildTest();
        $child_test->child_test_name = $request->main_test_name;
        $main_test =  MainTest::create($request->all());
        $main_test->load('childTests');
        $main_test->childTests()->save($child_test);
        return ['status' => true,'data'=>$main_test->refresh()];

    }
    public function chemistry(){
       return Package::with('tests')->find(2);
    }

    public function hormone(){
        return Package::with('tests')->find(3);
    }
    public function immune(){
        return Package::with('tests')->find(9);
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
    public function updateChildTest(Request $request,ChildTest $childTest)
    {
        $data = $request->all();
       $childTest->update([$data['colName'] => $data['val']]);
    }
}
