<?php

namespace App\Http\Controllers;

use App\Models\Contract;
use App\Models\Item;
use Illuminate\Http\Request;

class ContractController extends Controller
{
    public function store(Request $request)
    {
        return ['status'=>Contract::create($request->all())];
    }
    public function pagination(Request $request)
    {
        $user =  auth()->user();


            $item =  $request->item;

            if ( $request->query('word') && $request->query('word') != ''){
                $word = $request->query('word');

                return collect( Contract::orderByDesc('id')->orWhere('tenant_name','like',"%$word%")->orWhere('room_no','like',"%$word%")->orWhere('building_no','like',"%$word%")->paginate($item));
            }
            return collect( Contract::orderByDesc('id')->paginate($item));


    }
}
