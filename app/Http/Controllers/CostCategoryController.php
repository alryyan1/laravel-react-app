<?php

namespace App\Http\Controllers;

use App\Models\CostCategory;
use Illuminate\Http\Request;

class CostCategoryController extends Controller
{
    public function store(Request $request){

        return ['status'=>  CostCategory::create($request->all())];
    }

    public function index(Request $request){
        return   CostCategory::all();
    }
}
