<?php

namespace App\Http\Controllers;

use App\Models\Cost;
use App\Models\Shift;
use Illuminate\Http\Request;

class CostController extends Controller
{
    public function store(Request $request)
    {
        $id =  Shift::max('id');
        $user =  auth()->user();

        $result =   Cost::create(['shift_id'=>$id,'description'=>$request->name,'doctor_shift_id'=>$request->id,'amount'=>$request->amount,'user_cost'=>$user->id]);
        return ['status' => $result];
    }
    public function costs(Request $request){
        return Cost::all();
    }
    public function addGeneralCost(Request $request)
    {
        $id =  Shift::max('id');
        $data = $request->all();
        $user =  auth()->user();

        $result =   Cost::create(['shift_id'=>$id,'description'=>$data['description'],'amount'=>$request->amount,'user_cost'=>$user->id,'cost_category_id'=>$request->cost_category_id]);
        return ['status' => $result,'data'=>Shift::latest()->first()];
    }
    public function destroy(Request $request,Cost $cost)
    {
        return ['status' => $cost->delete(),'data'=>Shift::latest()->first()];
    }
}
