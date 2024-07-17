<?php

namespace App\Http\Controllers;

use App\Models\Contract;
use App\Models\ContractState;
use App\Models\Item;
use App\Models\State;
use Illuminate\Http\Request;

class ContractController extends Controller
{
    public function update(Request $request , Contract  $contract)
    {
       return ['status'=>$contract->update(['user_handed'=>$request->user_id])];
    }
    public function addStateToContract(Request $request,Contract $contract){
        $user =  auth()->user();
        $contractState = new ContractState();
        $contractState->user_id = $user->id;
        $contractState->state_id = $request->state_id;
        $contract->states()->save($contractState);
        return ['status'=>true,'contract'=>$contract->fresh()];
    }
    public function createState(Request $request)
    {
        return ['status'=>true,'data'=>State::create(['name' => $request->name])];
    }
    public function getStates()
    {
        return State::all();



    }
    public function createContractState(Request $request)
    {
        return ContractState::create(['name' => $request->name]);
    }
    public function store(Request $request)
    {
        $user =  auth()->user();
        return ['status' => Contract::create([
            'tenant_name'=>$request->tenant_name,
            'room_no'=>$request->room_no,
            'building_no'=>$request->building_no,
            'checklist'=>$request->checklist,
            'notes'=>$request->notes,
            'user_id'=>$user->id,
        ])];
    }
    public function pagination(Request $request)
    {
        $user =  auth()->user();


        $item =  $request->item;

        if ($request->query('word') && $request->query('word') != '') {
            $word = $request->query('word');

            return collect(Contract::orderByDesc('id')->orWhere('tenant_name', 'like', "%$word%")->orWhere('room_no', 'like', "%$word%")->orWhere('building_no', 'like', "%$word%")->paginate($item));
        }
        return collect(Contract::orderByDesc('id')->paginate($item));
    }
}
