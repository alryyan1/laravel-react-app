<?php

namespace App\Http\Controllers;

use App\Models\Company;
use App\Models\Subcompany;
use Illuminate\Http\Request;

class SubCompanyController extends Controller
{
    public function update(Request $request , Subcompany $subcompany){
        $data = $request->all();
//        return  $subcompany;
        return ['status' => $subcompany->update([$data['colName'] => $data['val']])];
    }
    public function all(){
        return Subcompany::with('company')->get();
    }
    public function store(Request $request,Company $company){
        $subcombany = new Subcompany();
        $subcombany->name = $request->name;
        $subcombany->lab_endurance = $request->lab_endurance;
        $subcombany->service_endurance = $request->service_endurance;

        $company->sub_companies()->save($subcombany);

        return ['status'=>true];
    }
}
