<?php

namespace App\Http\Controllers;

use App\Models\ChildTest;
use App\Models\LabRequest;
use App\Models\RequestedResult;
use Illuminate\Http\Request;

class RequestedResultController extends Controller
{
    public function default(Request $request , LabRequest $labRequest){
        /** @var RequestedResult $result */
        foreach ($labRequest->requested_results as $result){

            $result->update(['result'=> $result->childTest->defval]);
        }

        return ['status'=>true,'labrequest'=>$labRequest->refresh()];
    }

    public function save(Request $request , RequestedResult $requestedResult){
       $val =  $request->get('val');
       $result = $requestedResult->update(['result'=>$val]);
       return ['status'=> $result];
    }
}
