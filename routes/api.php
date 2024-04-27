<?php

use App\Http\Controllers\ClientController;
use App\Http\Controllers\DepositController;
use App\Http\Controllers\ItemController;
use App\Http\Controllers\LabRequestController;
use App\Http\Controllers\PatientController;
use App\Http\Controllers\SectionController;
use App\Http\Controllers\SupplierController;
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


Route::middleware('auth:sanctum')->post('client/create',[ClientController::class,'create']);
Route::delete('client/{client}',[ClientController::class,'destroy']);
Route::get('client/all',[ClientController::class,'index']);

Route::post('suppliers/create',[SupplierController::class,'create']);
Route::get('suppliers/all',[SupplierController::class,'index']);
Route::delete('suppliers/{supplier}',[SupplierController::class,'destroy']);
Route::patch('suppliers/{supplier}',[SupplierController::class,'update']);


Route::post('items/create',[ItemController::class,'create']);
Route::delete('items/{item}',[ItemController::class,'destroy']);
Route::patch('items/{item}',[ItemController::class,'update']);
Route::get('items/all',[ItemController::class,'all']);
Route::get('items/balance',[ItemController::class,'balance']);


Route::post('sections/create',[SectionController::class,'create']);
Route::get('sections/all',[SectionController::class,'all']);
Route::delete('sections/{section}',[SectionController::class,'destroy']);
Route::patch('sections/{section}',[SectionController::class,'update']);


Route::controller(DepositController::class)->group(function (){
    Route::prefix('inventory/deposit')->group(function (){
        Route::post('/','deposit');
        Route::get('/complete','complete');
        Route::get('/last','last');
        Route::delete('/','destroy');
    });

});


//
Route::post('inventory/deduct',[\App\Http\Controllers\DeductController::class,'deduct']);
Route::get('inventory/deduct/complete',[\App\Http\Controllers\DeductController::class,'complete']);
Route::get('inventory/deduct/last',[\App\Http\Controllers\DeductController::class,'last']);
Route::delete('inventory/deduct',[\App\Http\Controllers\DeductController::class,'destroy']);


Route::post('login',[\App\Http\Controllers\AuthController::class,'login']);
Route::middleware('auth:sanctum')->post('logout',[\App\Http\Controllers\AuthController::class,'logout']);
Route::post('signup',[\App\Http\Controllers\AuthController::class,'signup']);
