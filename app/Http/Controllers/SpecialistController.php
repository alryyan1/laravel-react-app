<?php

namespace App\Http\Controllers;

use App\Models\Specialist;
use Illuminate\Http\Request;

class SpecialistController extends Controller
{
    public function all(){
        return Specialist::all();
    }
    public function store(Request $request){
        Specialist::create($request->all());
    }
    public function update(Request $request, Specialist $specialist){
        $data = $request->all();

        return ['status' => $specialist->update([$data['colName'] => $data['val']])];

    }
}
