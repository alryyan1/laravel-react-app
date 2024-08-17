<?php

namespace App\Http\Controllers;

use App\Models\Company;
use App\Models\CompanyRelation;
use App\Models\Subcompany;
use Illuminate\Http\Request;

class CompanyRelationController extends Controller
{
    public function update(Request $request , CompanyRelation $companyRelation){
        $data = $request->all();
//        return  $companyRelation;
        return ['status' => $companyRelation->update([$data['colName'] => $data['val']])];
    }
    public function all(){
        return CompanyRelation::with('company')->get();
    }
    public function store(Request $request,Company $company){
        $relation = new CompanyRelation();
        $relation->name = $request->name;
        $relation->lab_endurance = $request->lab_endurance;
        $relation->service_endurance = $request->service_endurance;

        $company->relations()->save($relation);

        return ['status'=>true];
    }
}
