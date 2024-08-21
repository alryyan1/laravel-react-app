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
use App\Models\Package;
use App\Models\Patient;
use App\Models\RequestedResult;
use App\Models\Shift;
use App\Models\Shipping;
use App\Models\Sysmex5;
use Barryvdh\Debugbar\Facades\Debugbar as FacadesDebugbar;
use DebugBar\DebugBar;
use Elibyy\TCPDF\Facades\TCPDF;
use Illuminate\Http\Client\Request;
use Illuminate\Http\Request as HttpRequest;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Route;
use Spatie\Permission\Models\Permission;
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

Route::get('expired/items',[\App\Http\Controllers\PDFController::class,'balancebyExpire']);
Route::get('labPrices',[\App\Http\Controllers\PDFController::class,'labprice']);
Route::get('excel/items',[\App\Http\Controllers\ExcelController::class,'items']);
Route::get('excel/labPrices',[\App\Http\Controllers\ExcelController::class,'lapPrices']);
Route::get('result',[\App\Http\Controllers\PDFController::class,'result']);
Route::get('printLab',[\App\Http\Controllers\PDFController::class,'printLab']);
Route::get('printSale',[\App\Http\Controllers\PDFController::class,'printSale']);

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
   return Sysmex5::find(1);
//        \App\Models\Route::create(['name'=>'المخزن','path'=>'inventory']);
//        \App\Models\Route::create(['name'=>'الصيدليه','path'=>'pharma']);
//        \App\Models\Route::create(['name'=>'التدقيق','path'=>'audit']);
//        \App\Models\Route::create(['name'=>'المختبر','path'=>'lab']);
//        \App\Models\Route::create(['name'=>'العيادات','path'=>'clinic']);
//        \App\Models\Route::create(['name'=>'التعاقدات','path'=>'insurance']);
//        \App\Models\Route::create(['name'=>'الخدمات','path'=>'services']);
//        \App\Models\Route::create(['name'=>'الاعدادات','path'=>'settings']);
//        \App\Models\Route::create(['name'=>'الرئيسيه','path'=>'dashboard']);
//
//            \App\Models\SubRoute::create(['name'=>'define','path'=>'/pharmacy/add','route_id'=>2]);
//            \App\Models\SubRoute::create(['name'=>'pos','path'=>'/pharmacy/sell','route_id'=>2]);
//            \App\Models\SubRoute::create(['name'=>'items','path'=>'/pharmacy/items','route_id'=>2]);
//            \App\Models\SubRoute::create(['name'=>'sales','path'=>'/pharmacy/reports','route_id'=>2]);
//            \App\Models\SubRoute::create(['name'=>'inventory','path'=>'/pharmacy/inventory','route_id'=>2]);
//            \App\Models\SubRoute::create(['name'=>'income','path'=>'/pharmacy/deposit','route_id'=>2]);
//            \App\Models\SubRoute::create(['name'=>'expenses','path'=>'/clinic/denos','route_id'=>2]);
//
//        \App\Models\SubRoute::create(['name'=>'الحجز','path'=>'/clinic','route_id'=>5]);
//        \App\Models\SubRoute::create(['name'=>'استحقاق الاطباء','path'=>'/clinic/doctors','route_id'=>5]);
//        \App\Models\SubRoute::create(['name'=>'حساب الفئات','path'=>'clinic/denos','route_id'=>5]);
//
//
//        \App\Models\SubRoute::create(['name'=>'تسجيل مريض','path'=>'laboratory/add','route_id'=>4]);
//        \App\Models\SubRoute::create(['name'=>'ادخال النتائج ','path'=>'laboratory/result','route_id'=>4]);
//        \App\Models\SubRoute::create(['name'=>'سحب العينات','path'=>'laboratory/sample','route_id'=>4]);
//        \App\Models\SubRoute::create(['name'=>'اداره التحاليل ','path'=>'laboratory/tests','route_id'=>4]);
//        \App\Models\SubRoute::create(['name'=>'قائمه الاسعار','path'=>'laboratory/price','route_id'=>4]);
//        \App\Models\SubRoute::create(['name'=>'CBC LIS','path'=>'laboratory/cbc-lis','route_id'=>4]);
//        \App\Models\SubRoute::create(['name'=>'Chemistry LIS','path'=>'laboratory/chemistry-lis','route_id'=>4]);

//        Permission::create(['name' => 'الغاء سداد فحص','guard_name'=>'web']);
//        Permission::create(['name' => 'التخفيض','guard_name'=>'web']);
//        Permission::create(['name' => 'سداد فحص','guard_name'=>'web']);
//        Permission::create(['name' => 'تعديل بيانات المريض','guard_name'=>'web']);
//
//
//        Permission::create(['name' => 'الغاء سداد خدمه','guard_name'=>'web']);
//        Permission::create(['name' => 'سداد خدمه','guard_name'=>'web']);
//        Permission::create(['name' => 'حذف خدمه','guard_name'=>'web']);
//           return  \App\Models\Doctorvisit::find(2);
//   $data =      DB::table('products_export_2024_07_10')->select('*')->get();


//   foreach ($data as $item) {
//       $pdo =   DB::getPdo();
//       $result =   $pdo->prepare("select * from items where barcode = ? ");
//       $result->execute([$item->barcode]);
//       if ($result->rowCount() > 0){
//           continue ;
//
//       }
//       Item::create([
//           'section_id' => NULL,
//           'name' => '',
//           'require_amount' => 0,
//           'initial_balance' => 0,
//           'initial_price' => 0,
//           'tests' => 0,
//           'expire' => '2024-07-01',
//           'cost_price' => $item->purchase_price,
//           'sell_price' => $item->selling_price,
//           'drug_category_id' => NULL,
//           'pharmacy_type_id' => NULL,
//           'barcode' => $item->barcode,
//           'strips' => 1,
//           'sc_name' => $item->name,
//           'market_name' => $item->name,
//           'batch' => NULL,
//           'unit' => '',
//       ]);
//   }

    });

//inventory
Route::get('pdf',[\App\Http\Controllers\PDFController::class,'invnetoryIncome']);
Route::get('deduct/report',[\App\Http\Controllers\PDFController::class,'deductReport']);
Route::get('deduct/invoice',[\App\Http\Controllers\PDFController::class,'deductInvoice']);
Route::get('shippings',[\App\Http\Controllers\PDFController::class,'shipping']);


Route::group(['middleware' => ['can:reports']], function () {
    Route::middleware('auth:sanctum')->get('balance',[\App\Http\Controllers\PDFController::class,'balance']);
});

//lab
Route::get('insurance/report',[\App\Http\Controllers\PDFController::class,'insuranceReport']);
Route::get('lab/report',[\App\Http\Controllers\PDFController::class,'labreport']);
Route::get('pharmacy/sellsReport',[\App\Http\Controllers\PDFController::class,'sellReport']);
Route::get('searchDeductByDate',[\App\Http\Controllers\PDFController::class,'searchDeductByDate']);
Route::get('costReport',[\App\Http\Controllers\PDFController::class,'costReport']);
Route::get('expireReport',[\App\Http\Controllers\PDFController::class,'expiredItems']);
//clinics
Route::get('userClinicReport',[\App\Http\Controllers\PDFController::class,'userClinicReport']);
Route::get('clinics/report',[\App\Http\Controllers\PDFController::class,'clinicsReport']);
Route::get('clinics/all',[\App\Http\Controllers\PDFController::class,'allclinicsReport']);
Route::get('clinics2/all',[\App\Http\Controllers\PDFController::class,'allclinicsReport2']);
Route::get('clinics/doctor/report',[\App\Http\Controllers\PDFController::class,'clinicReport']);

//company
Route::get('company/test/{company}',[\App\Http\Controllers\PDFController::class,'companyTest']);
Route::get('company/service/{company}',[\App\Http\Controllers\PDFController::class,'companyService']);


require __DIR__.'/auth.php';
