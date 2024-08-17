<?php

namespace App\Http\Controllers;

use App\Models\PharmacyType;
use Illuminate\Http\Request;

class PharmacyTypeController extends Controller
{
    public function index()
    {
        return PharmacyType::all();
    }
    public function store(Request $request)
    {
       return   PharmacyType::create($request->all());
    }
}
