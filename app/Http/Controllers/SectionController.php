<?php

namespace App\Http\Controllers;

use App\Models\Section;
use Illuminate\Http\Request;

class SectionController extends Controller
{
    public function create(Request $request ){
        $data =  $request->all();
        $result =  Section::create(['name'=>$data['name']]);
        return ['status'=>$result];
    }

    public function destroy(Request $request , Section $section){
       return ['status'=> $section->delete()];
    }
    public function all(Request $request ){
        return Section::all();
    }
    public function update(Request $request , Section $section){
        $data = $request->all();
//        return $data;

        return ['status'=>$section->update([$data['colName']=>$data['val']])];

    }
}
