<?php

use App\Http\Controllers\PatientController;
use App\Http\Controllers\ProfileController;
use App\Models\ChildTest;
use App\Models\Doctor;
use App\Models\Item;
use App\Models\MainTest;
use App\Models\Patient;
use Barryvdh\Debugbar\Facades\Debugbar as FacadesDebugbar;
use DebugBar\DebugBar;
use Elibyy\TCPDF\Facades\TCPDF;
use Illuminate\Http\Client\Request;
use Illuminate\Http\Request as HttpRequest;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    FacadesDebugbar::info('hi');


    return view('welcome');
});
Route::get('/about',function (HttpRequest $request) {
    FacadesDebugbar::info('hi');
    return response('Hello World', 200)->header('Access-Control-Allow-Origin',$request->ip());
});
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});
Route::get('/home', function () {
    FacadesDebugbar::info('info');
    return "h";
});

Route::get('test',function (){
    return join('-',Patient::first()->labrequests()->pluck('main_test_name')->all());
});
//inventory
Route::get('pdf',[\App\Http\Controllers\PdfController::class,'invnetoryIncome']);
Route::get('lab/report',[\App\Http\Controllers\PdfController::class,'labreport']);
Route::get('balance',[\App\Http\Controllers\PdfController::class,'balance']);

require __DIR__.'/auth.php';
