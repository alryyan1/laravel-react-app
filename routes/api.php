<?php

use App\Http\Controllers\LabRequestController;
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
Route::get('tests',[\App\Http\Controllers\MainTestController::class,'show']);
Route::get('packages/all',function (){
    return \App\Models\Package::with('tests')->get();
});
Route::post('patients/add',[PatientController::class,'store']);
Route::post('patients/edit/{patient}',[PatientController::class,'edit']);
Route::post('labRequest/add/{patient}',[LabRequestController::class,'store']);
Route::patch('labRequest/{patient}',[LabRequestController::class,'edit']);
Route::patch('labRequest/payment/{patient}',[LabRequestController::class,'payment']);
Route::patch('labRequest/cancelPayment/{patient}',[LabRequestController::class,'cancel']);
Route::patch('labRequest/bankak/{patient}',[LabRequestController::class,'bankak']);

Route::get('labRequest/{patient}',[LabRequestController::class,'all']);
Route::delete('labRequest/{patient}',[LabRequestController::class,'destroy']);


Route::post('client/create',[\App\Http\Controllers\ClientController::class,'create']);
Route::delete('client/{client}',[\App\Http\Controllers\ClientController::class,'destroy']);
Route::get('client/all',[\App\Http\Controllers\ClientController::class,'index']);

Route::post('suppliers/create',[\App\Http\Controllers\SupplierController::class,'create']);
Route::get('suppliers/all',[\App\Http\Controllers\SupplierController::class,'index']);
Route::delete('suppliers/{supplier}',[\App\Http\Controllers\SupplierController::class,'destroy']);


Route::post('items/create',[\App\Http\Controllers\ItemController::class,'create']);
Route::delete('items/{item}',[\App\Http\Controllers\ItemController::class,'destroy']);
Route::patch('items/{item}',[\App\Http\Controllers\ItemController::class,'update']);
Route::get('items/all',[\App\Http\Controllers\ItemController::class,'all']);


Route::post('sections/create',[\App\Http\Controllers\SectionController::class,'create']);
Route::get('sections/all',[\App\Http\Controllers\SectionController::class,'all']);
Route::delete('sections/{section}',[\App\Http\Controllers\SectionController::class,'destroy']);
