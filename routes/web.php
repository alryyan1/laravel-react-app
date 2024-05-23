<?php

use App\Http\Controllers\PatientController;
use App\Http\Controllers\ProfileController;
use App\Models\ChildTest;
use App\Models\Company;
use App\Models\Deposit;
use App\Models\DepositItems;
use App\Models\Doctor;
use App\Models\Item;
use App\Models\MainTest;
use App\Models\Patient;
use Barryvdh\Debugbar\Facades\Debugbar as FacadesDebugbar;
use DebugBar\DebugBar;
use Elibyy\TCPDF\Facades\TCPDF;
use Illuminate\Http\Client\Request;
use Illuminate\Http\Request as HttpRequest;
use Illuminate\Support\Carbon;
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
    $date_f = Carbon::now()->addDay()->format('Y-m-d');
    $now =  Carbon::now();
    $now2 =  Carbon::now();
    $start_date =  $now->setMonth(5)->setDay(1);
    $end_date = $now2->setMonth(5)->setDay(1)->addMonth();
    $dates = [];
    while ($start_date <= $end_date) {
        $first_day_last_month =   $start_date->format('Y-m-d');

//         dd($first_day_last_month);

        $deposit_items =  Deposit:: where('bill_date',$first_day_last_month)->get();
        $total = 0;
        /** @var Deposit $deposit */
        foreach ($deposit_items as $deposit) {
            $deposit->load(['items'=>function ($query) {
                $query->where('deposit_items.item_id',106);
            }]);
            $total+= $deposit->items->sum('pivot.quantity');
        }
        $deducts =  \App\Models\Deduct:: whereDate('created_at',$first_day_last_month)->get();
        $total_deducts = 0;
        /** @var \App\Models\Deduct $deduct */
        foreach ($deducts as $deduct) {
            $deduct->load(['items'=>function ($query)  {
                $query->where('deducted_items.item_id',106);
            }]);
            $total_deducts+= $deduct->items->sum('pivot.quantity');
        }
        $dates [] = ['date'=>$first_day_last_month,'income'=>$total,'deducts'=>$total_deducts];
        $start_date->addDay();
    }
//    dd($first_day_last_month);
    return $dates;
});
//inventory
Route::get('pdf',[\App\Http\Controllers\PdfController::class,'invnetoryIncome']);
Route::get('deduct/report',[\App\Http\Controllers\PdfController::class,'deductReport']);
Route::get('balance',[\App\Http\Controllers\PdfController::class,'balance']);

//lab
Route::get('lab/report',[\App\Http\Controllers\PdfController::class,'labreport']);
//clinics
Route::get('clinics/report',[\App\Http\Controllers\PdfController::class,'clinicsReport']);
Route::get('clinics/doctor/report',[\App\Http\Controllers\PdfController::class,'clinicReport']);

//company
Route::get('company/test/{company}',[\App\Http\Controllers\PdfController::class,'companyTest']);
Route::get('company/service/{company}',[\App\Http\Controllers\PdfController::class,'companyService']);


require __DIR__.'/auth.php';
