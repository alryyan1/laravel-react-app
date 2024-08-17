<?php

namespace App\Http\Controllers;

use App\Models\CbcBinder;
use App\Models\ChemistryBinder;
use App\Models\ChildTest;
use App\Models\LabRequest;
use App\Models\MainTest;
use App\Models\Mindray;
use App\Models\Package;
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
    public function comment(Request $request,LabRequest $labRequest){
      return ['status'=>$labRequest->update(['comment'=>$request->get('val')])];
    }
    public function populateMindrayMatchingTable(Request $request){
        $names =   DB::connection()->getSchemaBuilder()->getColumnListing('mindray2');

        foreach ($names as $name){
                ChemistryBinder::create(['child_id_array'=>1,'name_in_mindray_table'=>$name]);
        }
    }
    public function sysmexColumnNames(Request $request){
        return  DB::connection()->getSchemaBuilder()->getColumnListing('sysmex');

    }  public function Chemistry(Request $request){
        return  DB::connection()->getSchemaBuilder()->getColumnListing('mindray2');

    }
    public function populatePatientCbcData(Request $request,Patient $patient){
        $main_test_id = $request->get('main_test_id');
        $sysmex =   Sysmex::where('patient_id','=',$patient->id)->first();
        if ($sysmex == null){
            return  ['status'=>false,'message'=>'no data found'];
        }
        $bindings =   \App\Models\CbcBinder::all();
        /** @var \App\Models\CbcBinder $binding */
        $object = null;
        foreach ($bindings as $binding){
            $object[$binding->name_in_sysmex_table] =[
                'child_id'=>[$binding->child_id_array],
                'result'=> $sysmex[$binding->name_in_sysmex_table]
            ];
            $child_array =  explode(',',$binding->child_id_array);
            foreach ($child_array as $child_id){
                $requested_result = RequestedResult::whereChildTestId($child_id)->where('main_test_id','=',$main_test_id)->where('patient_id','=',$patient->id)->first();
                if ($requested_result !=null){

                    $requested_result->update(['result'=>$sysmex[$binding->name_in_sysmex_table]]);
                }

            }

        }

        return ['status'=>true,'patient'=>$patient->refresh(),'cbcObj'=>$object];
    }
    public function populatePatientChemistryData(Request $request,Patient $patient){
        $main_test_id = $request->get('main_test_id');
        $chemistry =   Mindray::where('pid','=',$patient->id)->first();
        if ($chemistry == null){
            return  ['status'=>false,'message'=>'no data found'];
        }
        $bindings =   \App\Models\ChemistryBinder::all();
        /** @var \App\Models\ChemistryBinder $binding */
        $object = null;
        foreach ($bindings as $binding){
            $object[$binding->name_in_mindray_table] =[
                'child_id'=>[$binding->child_id_array],
                'result'=> $chemistry[$binding->name_in_mindray_table]
            ];
            $child_array =  explode(',',$binding->child_id_array);
            foreach ($child_array as $child_id){
                $requested_result = RequestedResult::whereChildTestId($child_id)->where('main_test_id','=',$main_test_id)->where('patient_id','=',$patient->id)->first();
                if ($requested_result !=null){

                    $requested_result->update(['result'=>$chemistry[$binding->name_in_mindray_table]]);
                }

            }

        }

        return ['status'=>true,'patient'=>$patient->refresh(),'chemistryObj'=>$object];
    }
    public function updateCbcBindings(Request $request , CbcBinder $cbcBinder){
       $data  =   $request->all();
       $cbcBinder->update([$data['colName']=>$data['val']]);
    }

    public function updateChemistryBindings(Request $request , ChemistryBinder $chemistryBinder){
       $data  =   $request->all();
        $chemistryBinder->update([$data['colName']=>$data['val']]);
    }
    public function getCbcBindings(Request $request){
       return CbcBinder::all();
    }
    public function getChemistryBindings(Request $request){
       return ChemistryBinder::all();
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
