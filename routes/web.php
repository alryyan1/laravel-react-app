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
Route::post('previewLabel',[\App\Http\Controllers\PDFController::class,'previewLabel']);
Route::get('labPrices',[\App\Http\Controllers\PDFController::class,'labprice']);
Route::get('excel/items',[\App\Http\Controllers\ExcelController::class,'items']);
Route::get('excel/labPrices',[\App\Http\Controllers\ExcelController::class,'lapPrices']);
Route::get('result',[\App\Http\Controllers\PDFController::class,'result']);
Route::get('printLab',[\App\Http\Controllers\PDFController::class,'printLab']);
Route::get('printSale',[\App\Http\Controllers\PDFController::class,'printSale']);
Route::get('printReceptionReceipt',[\App\Http\Controllers\PDFController::class,'printReceptionReceipt']);
Route::get('profitAndLoss',[\App\Http\Controllers\PDFController::class,'profitAndLoss']);
Route::get('printPrescribedMedsReceipt',[\App\Http\Controllers\PDFController::class,'printPrescribedMedsReceipt']);
Route::get('sickleave',[\App\Http\Controllers\PDFController::class,'sickleave']);
Route::get('attendance',[\App\Http\Controllers\PDFController::class,'attendance']);
Route::get('printLabAndClinicReceipt',[\App\Http\Controllers\PDFController::class,'printLabAndClinicReceipt']);
Route::get('patientsReport',[\App\Http\Controllers\PDFController::class,'patientsReport']);
Route::get('printLabReceipt/{patient}/{user}',[\App\Http\Controllers\PDFController::class,'printLabReceipt']);

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
Route::get('info',function (){
   echo  phpinfo();
});
Route::post('webhook',[WebhookController::class,'webhook']);
    Route::get('migrate',function (){
      $items = \App\Models\DepositItem::all();
      $count = 0;
      /** @var \App\Models\DepositItem $item */
        foreach ($items as $item){
          $sell_price = $item->item->sell_price;
          $updated = $item->update(['sell_price'=>$sell_price]);
          if ($updated){
              $count++;
          }
      }
        return ['status'=>true,'count'=>$count];
    });

    Route::get('deleteDuplicates',function (){
        $items =  Item::all();
        $deletedCount = 0;
        /** @var Item $item */
        foreach ($items as  $item){
            $depositItem =  \App\Models\DepositItem::where('item_id','=',$item->id)->first();
            if ($depositItem){
                continue;
            }
            //if this item has multiples
            $duplicatedItems =  Item::where('market_name','=',$item->market_name)->get();
            if (count($duplicatedItems) > 0){
                foreach ($duplicatedItems as $duplicatedItem){
                    $depositItem =  \App\Models\DepositItem::where('item_id','=',$duplicatedItem->id)->first();
                    if ($depositItem){
                        continue;
                    }
                    $item->delete();
                    $deletedCount++;

                }
            }


        }

        echo  'deleted items'.$deletedCount;

    });
    Route::get('test',function (){

       $items =  Item::all();
       $deletedCount = 0;
       /** @var Item $item */
        foreach ($items as  $item){
          $depositItem =  \App\Models\DepositItem::where('item_id','=',$item->id)->first();
          if ($depositItem){
              continue;
          }
          //if this item has multiples
           $duplicatedItems =  Item::where('market_name','=',$item->market_name)->get();
          if (count($duplicatedItems) > 0){
              foreach ($duplicatedItems as $duplicatedItem){
                  $depositItem =  \App\Models\DepositItem::where('item_id','=',$duplicatedItem->id)->first();
                  if ($depositItem){
                      continue;
                  }
                  $item->delete();
                  $deletedCount++;

              }
          }


       }

        echo  'deleted items'.$deletedCount;

//        $data =      DB::table('stock_1')->select('*')->get();
//
//
//        foreach ($data as $item) {
//            $pdo =   DB::getPdo();
//            $result =   $pdo->prepare("select * from items where barcode = ? ");
//            $result->execute([$item->barcode]);
//            if ($result->rowCount() > 0){
//                continue ;
//
//            }
////            dd($item);
//            Item::create([
//                'section_id' => NULL,
//                'name' => '',
//                'require_amount' => 0,
//                'initial_balance' => 0,
//                'initial_price' => 0,
//                'tests' => 0,
//                'expire' => '1999-01-01',
//                'cost_price' =>$item->cost,
//                'sell_price' => $item->sell ?? 0,
//                'drug_category_id' => NULL,
//                'pharmacy_type_id' => NULL,
//                'barcode' => $item->barcode,
//                'strips' => 1,
//                'sc_name' => '',
//                'market_name' => $item->market_name,
//                'batch' => NULL,
//                'active1' => $item->ACTIVE_1 ?? '',
//                'active2' => $item->ACTIVE_2?? '',
//                'active3' => $item->ACTIVE_3 ?? '',
//                'pack_size' => $item->PACK_SIZE ?? '',
//                'approved_rp' => $item->APPROVED_R_P ?? 0,
//            ]);
//        }
//

    });

//inventory
Route::get('pdf',[\App\Http\Controllers\PDFController::class,'invnetoryIncome']);
Route::get('deduct/report',[\App\Http\Controllers\PDFController::class,'deductReport']);
Route::get('deduct/invoice',[\App\Http\Controllers\PDFController::class,'deductInvoice']);
Route::get('shippings',[\App\Http\Controllers\PDFController::class,'shipping']);



    Route::get('balance',[\App\Http\Controllers\PDFController::class,'balance']);


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
