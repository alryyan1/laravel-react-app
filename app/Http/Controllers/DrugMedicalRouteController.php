<?php

namespace App\Http\Controllers;

use App\Models\MedicalDrugRoute;
use App\Models\PrescribedDrug;
use Illuminate\Http\Request;

class DrugMedicalRouteController extends Controller
{
    public function index(Request $request)
    {
        return MedicalDrugRoute::all();
    }

    public function store(Request $request){

             return [
                 'status'=> MedicalDrugRoute::create($request->all()),
             ];
    }

    public function edit (Request $request ,PrescribedDrug $prescribedDrug)
    {
        return [
            'status'=> $prescribedDrug->update($request->all()),
            'data'=>$prescribedDrug->patient->fresh()
        ];
    }
}
