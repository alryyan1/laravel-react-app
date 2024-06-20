<?php

namespace App\Http\Controllers;

use App\Models\CbcBinder;
use App\Models\ChildTest;
use App\Models\LabRequest;
use App\Models\MainTest;
use App\Models\Patient;
use App\Models\RequestedResult;
use App\Models\Sysmex;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class RequestedResultController extends Controller
{
    public function populate(Request $request){
        /** @var MainTest $cbc */
        $cbc =  MainTest::with('childTests','childTests.unit')->find(1);
        foreach ($cbc->childTests as $childTest){
                CbcBinder::create(['name_in_sysmex_table'=>$childTest->child_test_name,'name_in_cbc_child_table'=>$childTest->child_test_name]);
        }
    }
    public function sysmexColumnNames(Request $request){
        return  DB::connection()->getSchemaBuilder()->getColumnListing('sysmex');

    }
    public function populatePatientCbcData(Request $request,Patient $patient){

        $sysmex =   Sysmex::where('patient_id','=',$patient->id)->first();
//        return  ['data'=>$sysmex];
        if ($sysmex == null){
            return  ['status'=>false,'message'=>'no data found'];
        }
        $bindings =   CbcBinder::all();
        /** @var CbcBinder $binding */
        $object = null;
        $updatedRescored = 0;
        $arr = [];
        foreach ($bindings as $binding){
            $object[$binding->name_in_sysmex_table] = $sysmex[$binding->name_in_cbc_child_table];
            $child = ChildTest::whereChildTestName($binding->name_in_sysmex_table)->first();
//            echo  $child->child_test_name .'<br>';
            $request_result = \App\Models\RequestedResult::whereChildTestId($child->id)->where('main_test_id','=',1);
            $arr[]= $request_result;
            $updatedRescored+= $request_result->update(['result'=>$sysmex[$binding->name_in_cbc_child_table]]);
        }
        return ['status'=>true,'patient'=>$patient->refresh(),'cbcObj'=>$object,'updatedRecords'=>$updatedRescored,'requestedResults'=>$arr];
    }
    public function updateCbcBindings(Request $request , CbcBinder $cbcBinder){
       $data  =   $request->all();
       $cbcBinder->update(['name_in_cbc_child_table'=>$data['val']]);
    }
    public function getCbcBindings(Request $request){
       return CbcBinder::all();
    }
    public function edit(Request $request , RequestedResult $requestedResult){
       $result =   $requestedResult->update(['normal_range'=>$request->get('val')]);
       return ['status'=> $result];
    }
    public function default(Request $request , LabRequest $labRequest){
        /** @var RequestedResult $result */
        foreach ($labRequest->requested_results as $result){

            $result->update(['result'=> $result->childTest->defval]);
        }

        return ['status'=>true,'patient'=>$labRequest->patient];
    }

    public function save(Request $request , RequestedResult $requestedResult){
       $val =  $request->get('val');
       $result = $requestedResult->update(['result'=>$val]);
       return ['status'=> $result,'patient'=>$requestedResult->patient];
    }
}
