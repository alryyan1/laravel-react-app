<?php

use App\Http\Requests\StorePatientRequest;
use App\Models\Patient;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;





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


Route::get('patients', function () {

    echo json_encode(Patient::all());
});

Route::post('patients/add', function (StorePatientRequest $request) {

    Patient::create([
        'name' => $request->name,
        'doc_id' => $request->doc_id,
        'age' => $request->age,
        'phone' => $request->phone,
        'user_id' => $request->user()->id,
        'shift_id' => 1,
    ]);
});
