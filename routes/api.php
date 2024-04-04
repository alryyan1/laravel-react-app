<?php

use App\Http\Controllers\PatientController;
use App\Http\Requests\StorePatientRequest;
use App\Models\Patient;
use Barryvdh\Debugbar\Facades\Debugbar;
use Illuminate\Http\Request;
use Illuminate\Log\Logger;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Route;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpKernel\Log\Logger as LogLogger;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {

    return $request->user();
});


Route::get('patients', function (Request $request) {


    return  Patient::query()
        ->with('doctor')
    ->orderBy('id', 'desc')
    ->get();
});
Route::get('doctors', function (Request $request) {
    return  \App\Models\Doctor::with('specialist')->get();
});
Route::get('packages/all',function (){
    return \App\Models\Package::with('tests')->get();
});
Route::post('patients/add',[PatientController::class,'store']);
