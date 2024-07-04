<?php

namespace App\Http\Controllers;

use App\Models\DrugCategory;
use Illuminate\Http\Request;

class DrugCategoryController extends Controller
{
    public function index()
    {
        return DrugCategory::all();
    }
    public function store(Request $request)
    {
        return   DrugCategory::create($request->all());
    }
}
