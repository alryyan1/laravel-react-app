<?php

namespace App\Http\Controllers;

use App\Http\Requests\CompanyFormRequest;
use App\Models\Company;
use Illuminate\Http\Request;

class CompanyController extends Controller
{

    public function all(){
        return Company::with(['tests','services'])->get();
    }
    public function update(Request $request, Company $company)
    {
        $data = $request->all();
//        return $data;

        return ['status' => $company->update([$data['colName'] => $data['val']])];

    }
    public function updatePivot(Request $request, Company $company)
    {
        $data = $request->all();
        $test_id = $data['test_id'];
        $key = $data['colName'];
        $val = $data['val'];
        $company->tests()->updateExistingPivot($test_id,["$key" =>$val]);
//        return $data;

        return ['status' => true];

    }
    public function updatePivotService(Request $request, Company $company)
    {
        $data = $request->all();
        $test_id = $data['service_id'];
        $key = $data['colName'];
        $val = $data['val'];
        $company->services()->updateExistingPivot($test_id,["$key" =>$val]);
//        return $data;

        return ['status' => true];

    }
    public function pagination(Request $request)
    {
        $item =  $request->item;

        if ( $request->has('word')){
            $word = $request->query('word');

            return collect( Company::orderByDesc('id')->where('name','like',"%$word%")->paginate($item));
        }
        return collect( Company::orderByDesc('id')->paginate($item));
    }
    public function create(CompanyFormRequest $request){
       $data =  $request->validated();

//        return $data;
        /** @var Company $company */
       $company =  Company::create($data);
//       return $company;
       if ($company){
           $company->define_tests();
           $company->define_services();
       }
       return ['status',true,'company'=>$company];
    }
}
