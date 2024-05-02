<?php

namespace App\Http\Controllers;

use App\Models\Specialist;
use Illuminate\Http\Request;

class SpecialistController extends Controller
{
    public function all(){
        return Specialist::all();
    }
}
