<?php

use App\Http\Controllers\PatientController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\WebHookController;
use App\Models\ChildTest;
use App\Models\Company;
use App\Models\Deposit;
use App\Models\DepositItems;
use App\Models\Doctor;
use App\Models\DoctorShift;
use App\Models\Item;
use App\Models\MainTest;
use App\Models\Patient;
use App\Models\Shift;
use App\Models\Shipping;
use Barryvdh\Debugbar\Facades\Debugbar as FacadesDebugbar;
use DebugBar\DebugBar;
use Elibyy\TCPDF\Facades\TCPDF;
use Illuminate\Http\Client\Request;
use Illuminate\Http\Request as HttpRequest;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Route;
use Spatie\Permission\Models\Role;

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

Route::post('webhook',[WebhookController::class,'webhook']);

    Route::get('test',function (){
//     return         $shift = Shift::latest()->first();
        return  Shipping::where('id','=',1)->where('phone',substr('96878622990',3))->get();

//      $role =     Role::create(['name' => 'admin']);
//         $role =        Role::findById(1);
//         return $role->permissions;
        \Spatie\Permission\Models\Permission::find(8)->delete();


//         $role->revokePermissionTo($p);
//        Role::create(['name' => 'deductor']);
//        Role::create(['name' => 'depositor']);
//        Role::create(['name' => 'viewer']);
//       $p =  \Spatie\Permission\Models\Permission::create(['name' => 'التقارير','guard_name' => 'api']);

//        $p->update(['name'=>'add items']);
//        $user = \App\Models\User::find(1);
//        $role->givePermissionTo($p);
//        $user->assignRole($role);
//       return  $user->can('add items') ? 'yes' :'no';

    });

//inventory
Route::get('pdf',[\App\Http\Controllers\PDFController::class,'invnetoryIncome']);
Route::get('deduct/report',[\App\Http\Controllers\PDFController::class,'deductReport']);
Route::get('shippings',[\App\Http\Controllers\PDFController::class,'shipping']);


Route::group(['middleware' => ['can:reports']], function () {
    Route::middleware('auth:sanctum')->get('balance',[\App\Http\Controllers\PDFController::class,'balance']);
});

//lab
Route::get('lab/report',[\App\Http\Controllers\PDFController::class,'labreport']);
//clinics
Route::get('clinics/report',[\App\Http\Controllers\PDFController::class,'clinicsReport']);
Route::get('clinics/all',[\App\Http\Controllers\PDFController::class,'allclinicsReport']);
Route::get('clinics/doctor/report',[\App\Http\Controllers\PDFController::class,'clinicReport']);

//company
Route::get('company/test/{company}',[\App\Http\Controllers\PDFController::class,'companyTest']);
Route::get('company/service/{company}',[\App\Http\Controllers\PDFController::class,'companyService']);


require __DIR__.'/auth.php';
