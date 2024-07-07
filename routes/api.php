<?php

use App\Http\Controllers\ClientController;
use App\Http\Controllers\CompanyController;
use App\Http\Controllers\DeductController;
use App\Http\Controllers\DepositController;
use App\Http\Controllers\DoctorController;
use App\Http\Controllers\DoctorShiftController;
use App\Http\Controllers\ItemController;
use App\Http\Controllers\LabRequestController;
use App\Http\Controllers\MainTestController;
use App\Http\Controllers\PatientController;
use App\Http\Controllers\SectionController;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\ShiftController;
use App\Http\Controllers\SpecialistController;
use App\Http\Controllers\SupplierController;
use App\Http\Requests\StorePatientRequest;
use App\Models\Patient;
use App\Models\Specialist;
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
Route::middleware('auth:sanctum')->delete('items/{item}', [ItemController::class, 'destroy']);
Route::middleware('auth:sanctum')->delete('deduct/{deduct}', [DeductController::class, 'deleteDeduct']);
Route::middleware('auth:sanctum')->post('searchDeductsByDate', [DeductController::class, 'searchDeductsByDate']);

Route::middleware('auth:sanctum')->patch('deduct/payment/{deduct}', [DeductController::class, 'payment']);
Route::middleware('auth:sanctum')->get('inventory/deduct/complete/{deduct}', [DeductController::class, 'complete']);
Route::middleware('auth:sanctum')->get('inventory/deduct/cancel/{deduct}', [DeductController::class, 'cancel']);
Route::middleware('auth:sanctum')->get('inventory/deduct/new', [DeductController::class, 'newDeduct']);

Route::middleware('auth:sanctum')->patch('deduct/{deduct}', [DeductController::class, 'update']);

Route::middleware('auth:sanctum')->post('addDrugForSell',[\App\Http\Controllers\ItemController::class,'addSell']);
Route::middleware('auth:sanctum')->patch('deductedItem/{deductedItem}',[\App\Http\Controllers\deductedItemController::class,'update']);
Route::middleware('auth:sanctum')->delete('inventory/deduct/{deductedItem}', [\App\Http\Controllers\deductedItemController::class, 'destroy']);

Route::post('drugs',[\App\Http\Controllers\DrugController::class,'store']);


Route::post('pharmacyTypes',[\App\Http\Controllers\PharmacyTypeController::class,'store']);
Route::get('pharmacyTypes',[\App\Http\Controllers\PharmacyTypeController::class,'index']);

Route::get('drugCategory',[\App\Http\Controllers\DrugCategoryController::class,'index']);
Route::post('drugCategory',[\App\Http\Controllers\DrugCategoryController::class,'store']);

Route::middleware('auth:sanctum')->post('settings',[\App\Http\Controllers\SettingController::class,'update']);
Route::get('settings',[\App\Http\Controllers\SettingController::class,'index']);



Route::middleware('auth:sanctum')->post('populate/denos',[\App\Http\Controllers\UserController::class,'populateDenos']);
Route::middleware('auth:sanctum')->patch('deno/user',[\App\Http\Controllers\UserController::class,'updateDenoUser']);
Route::middleware('auth:sanctum')->post('user/denos',[\App\Http\Controllers\UserController::class,'denosByLastShift']);

Route::get('result',[\App\Http\Controllers\PDFController::class,'result']);
Route::get('printLab',[\App\Http\Controllers\PDFController::class,'printLab']);
Route::get('printSale',[\App\Http\Controllers\PDFController::class,'printSale']);
Route::get('getChemistryColumnNames',[\App\Http\Controllers\RequestedResultController::class,'Chemistry']);
Route::post('populateMindrayMatchingTable',[\App\Http\Controllers\RequestedResultController::class,'populateMindrayMatchingTable']);
Route::get('getChemistryBindings',[\App\Http\Controllers\RequestedResultController::class,'getChemistryBindings']);
Route::patch('updateChemistryBindings/{chemistryBinder}',[\App\Http\Controllers\RequestedResultController::class,'updateChemistryBindings']);
Route::post('populatePatientChemistryData/{patient}',[\App\Http\Controllers\RequestedResultController::class,'populatePatientChemistryData']);



Route::post('populatePatientCbcData/{patient}',[\App\Http\Controllers\RequestedResultController::class,'populatePatientCbcData']);
Route::get('getSysmexColumnNames',[\App\Http\Controllers\RequestedResultController::class,'sysmexColumnNames']);
Route::post('populateCBCMatchingTable',[\App\Http\Controllers\RequestedResultController::class,'populate']);
Route::get('getCbcBindings',[\App\Http\Controllers\RequestedResultController::class,'getCbcBindings']);
Route::patch('updateCbcBindings/{cbcBinder}',[\App\Http\Controllers\RequestedResultController::class,'updateCbcBindings']);


Route::patch('requestedResult/{requestedResult}',[\App\Http\Controllers\RequestedResultController::class,'save']);
Route::patch('requestedResult/normalRange/{requestedResult}',[\App\Http\Controllers\RequestedResultController::class,'edit']);
Route::patch('comment/{labRequest}',[\App\Http\Controllers\RequestedResultController::class,'comment']);
Route::post('requestedResult/default/{labRequest}',[\App\Http\Controllers\RequestedResultController::class,'default']);
//cost
Route::middleware('auth:sanctum')->post("cost",[\App\Http\Controllers\CostController::class,'store']);
Route::middleware('auth:sanctum')->delete("cost/{cost}",[\App\Http\Controllers\CostController::class,'destroy']);
Route::middleware('auth:sanctum')->post("cost/general",[\App\Http\Controllers\CostController::class,'addGeneralCost']);

Route::get("users",[\App\Http\Controllers\UserController::class,'all']);
Route::patch("user/roles/{user}",[\App\Http\Controllers\UserController::class,'editRole']);


//roles
Route::post("roles",[\App\Http\Controllers\RoleController::class,'store']);
Route::delete("roles/{role}",[\App\Http\Controllers\RoleController::class,'destroy']);
Route::get("roles",[\App\Http\Controllers\RoleController::class,'all']);
Route::patch("roles/{role}",[\App\Http\Controllers\RoleController::class,'edit']);

Route::get("permissions",[\App\Http\Controllers\PermissionController::class,'all']);
Route::post("permissions",[\App\Http\Controllers\PermissionController::class,'store']);



//shipping-items
Route::post('addShippingState',[\App\Http\Controllers\ShippingStateController::class, 'addShippingState']);
Route::get('shippingState/all',[\App\Http\Controllers\ShippingStateController::class, 'all']);
Route::post('addShipItem',[\App\Http\Controllers\ShippingItemController::class, 'addShipItem']);
Route::post('addShipping',[\App\Http\Controllers\ShippingController::class, 'addShipping']);
Route::patch('shipping/{shipping}',[\App\Http\Controllers\ShippingController::class, 'update']);
Route::get('shipping/paginate/{page?}',[\App\Http\Controllers\ShippingController::class, 'pagination']);
Route::get('shipItems/all',[\App\Http\Controllers\ShippingItemController::class, 'all']);
Route::get('shipping/find/{shipping}',[\App\Http\Controllers\ShippingController::class, 'find']);

Route::patch('editChildTestGroup/{child_test}',[\App\Http\Controllers\childTestController::class,'editChildGroup']);
Route::get('childGroup',[\App\Http\Controllers\ChildGroupController::class,'all']);
Route::post('childGroup',[\App\Http\Controllers\ChildGroupController::class,'store']);
Route::get('childTestOption/{childTest}',[\App\Http\Controllers\ChildOptionController::class,'all']);
Route::patch('childTestOption/{childTestOption}',[\App\Http\Controllers\ChildOptionController::class,'update']);
Route::delete('childTestOption/{childTestOption}',[\App\Http\Controllers\ChildOptionController::class,'destroy']);
Route::post('childTestOption/{childTest}',[\App\Http\Controllers\ChildOptionController::class,'store']);
Route::patch('child_tests/{childTest}',[MainTestController::class,'updateChildTest']);
Route::patch('mainTest/{main_test}',[MainTestController::class,'update']);
Route::post('mainTest',[MainTestController::class,'store']);
Route::delete('maintest/{main_test}',[MainTestController::class,'destroy']);
Route::get('mainTestById/{id}',[\App\Http\Controllers\MainTestController::class,'getbyid']);
Route::get('chemistry',[\App\Http\Controllers\MainTestController::class,'chemistry']);

Route::delete('childTest/{childTest}',[\App\Http\Controllers\childTestController::class,'destroy']);
Route::post('childTest/create/{main_test}',[\App\Http\Controllers\childTestController::class,'store']);
Route::get('containers/all',[\App\Http\Controllers\ContainerController::class,'all']);
Route::get('units/all',[\App\Http\Controllers\UnitController::class,'all']);
Route::post('units',[\App\Http\Controllers\UnitController::class,'store']);

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {

    return $request->user();
});



//doctors
Route::patch('doctor/{doctor}', [DoctorController::class, 'update']);
Route::post('doctors/{doctor}/services', [DoctorController::class, 'addDoctorService']);
Route::patch('doctor/service/{doctorService}', [DoctorController::class, 'updateDoctorService']);
Route::delete('doctors/doctor/{doctor_service}', [DoctorController::class, 'deleteDoctorService']);

Route::middleware('auth:sanctum')->get('doctor/shift/open/{doctor}',[DoctorShiftController::class,'open']);
Route::middleware('auth:sanctum')->get('doctor/shift/close/{doctor}',[DoctorShiftController::class,'close']);
Route::middleware('auth:sanctum')->get('doctor/openShifts/{shift_id?}/{last?}/{open?}',[DoctorShiftController::class, 'DoctorShifts']);
Route::middleware('auth:sanctum')->get('doctor/byLastUnifiedShift',[DoctorShiftController::class, 'LastShift']);
Route::get('doctors', [DoctorController::class, 'all']);
Route::patch('doctors/{doctor}', [DoctorController::class, 'update']);
Route::post('doctors/add', [DoctorController::class, 'create']);
Route::get('doctors/pagination/{page_size}', [DoctorController::class, 'pagination']);


//specialists
Route::get('specialists/all', [SpecialistController::class, 'all']);
Route::post('specialists/add', [SpecialistController::class, 'store']);
Route::patch('specialists/{specialist}', [SpecialistController::class, 'update']);

//Route::get('lab/money', [ShiftController::class, 'total']);
Route::get('service/money', [ShiftController::class, 'totalService']);
Route::get('service/money/bank', [ShiftController::class, 'totalServiceBank']);
Route::get('shift/last', [ShiftController::class, 'last']);
Route::get('shiftById/{shift}', [ShiftController::class, 'shiftById']);
Route::post('shift/status/{shift}', [ShiftController::class, 'status']);

Route::get('tests', [\App\Http\Controllers\MainTestController::class, 'show']);
Route::get('packages/all', function () {
    return \App\Models\Package::with('tests')->get();
});
Route::middleware('auth:sanctum')->get('printLock/{patient}', [PatientController::class, 'printLock']);
Route::middleware('auth:sanctum')->get('patients', [PatientController::class, 'byName']);
Route::middleware('auth:sanctum')->post('patients/add/{isLab?}', [PatientController::class, 'store']);
Route::middleware('auth:sanctum')->post('/patients/add-patient-by-history/{patient}/{doctor}', [PatientController::class, 'registerVisit']);
Route::middleware('auth:sanctum')->post('/patients/add-patient-by-history-lab/{patient}/{doctor?}', [PatientController::class, 'saveByHistoryLab']);
Route::middleware('auth:sanctum')->post('patients/reception/add/{doctor}', [PatientController::class, 'book']);


//companies

Route::post('relation/create/{company}', [\App\Http\Controllers\CompanyRelationController::class, 'store']);
Route::post('subcompany/create/{company}', [\App\Http\Controllers\SubCompanyController::class, 'store']);
Route::get('subcompany/all', [\App\Http\Controllers\SubCompanyController::class, 'all']);
Route::get('relation/all', [\App\Http\Controllers\CompanyRelationController::class, 'all']);
Route::patch('subcompany/{subcompany}', [\App\Http\Controllers\SubCompanyController::class, 'update']);
Route::patch('relation/{companyRelation}', [\App\Http\Controllers\CompanyRelationController::class, 'update']);
Route::post('company/create', [CompanyController::class, 'create']);
Route::get('company/all', [CompanyController::class, 'all']);
Route::get('company/all/pagination/{company}', [CompanyController::class, 'pagination']);
Route::patch('company/{company}', [CompanyController::class, 'update']);
Route::patch('company/test/{company}', [CompanyController::class, 'updatePivot']);
Route::patch('company/service/{company}', [CompanyController::class, 'updatePivotService']);


Route::post('service/create', [ServiceController::class, 'create']);
Route::delete('service/{service}', [ServiceController::class, 'destroy']);
Route::get('service/all', [ServiceController::class, 'all']);
Route::get('service/all/pagination/{page}', [ServiceController::class, 'pagination']);
Route::patch('service/{service}', [ServiceController::class, 'update']);
Route::patch('service/test/{service}', [ServiceController::class, 'updatePivot']);
Route::middleware('auth:sanctum')->post('patient/service/add/{doctorvisit}', [ServiceController::class, 'addService']);

Route::get('serviceGroup/all', [\App\Http\Controllers\ServiceGroupController::class, 'all']);
Route::post('serviceGroup/create', [\App\Http\Controllers\ServiceGroupController::class, 'create']);
Route::patch('serviceGroup/{serviceGroup}', [\App\Http\Controllers\ServiceGroupController::class, 'update']);
Route::middleware('auth:sanctum')->delete('patient/service/{doctorvisit}',[ServiceController::class,'deleteService']);
Route::middleware('auth:sanctum')->get('patient/service/pay/{doctorvisit}',[ServiceController::class,'pay']);
Route::middleware('auth:sanctum')->get('patient/service/cancel/{doctorvisit}',[ServiceController::class,'cancel']);
Route::middleware('auth:sanctum')->patch('patient/service/bank/{doctorvisit}',[ServiceController::class,'bank']);
Route::middleware('auth:sanctum')->patch('patient/service/count/{doctorvisit}',[ServiceController::class,'count']);

Route::patch('patient/service/discount/{doctorvisit}',[ServiceController::class,'discount']);
Route::patch('patient/service/count/{patient}',[ServiceController::class,'count']);
Route::post('patient/search', [PatientController::class, 'search']);
Route::post('patient/search/phone', [PatientController::class, 'searchByphone']);
Route::post('patient/copy/{patient}/{doctor}', [PatientController::class, 'registerVisit']);
Route::get('patient/{patient}', [PatientController::class, 'get']);
Route::patch('patients/edit/{doctorvisit}', [PatientController::class, 'edit']);
Route::patch('patients/{patient}', [PatientController::class, 'update']);
Route::get('patient/barcode/{patient}', [PatientController::class, 'printBarcode']);
Route::middleware('auth:sanctum')->post('labRequest/add/{patient}', [LabRequestController::class, 'store']);
Route::patch('labRequest/{labRequest}', [LabRequestController::class, 'edit']);
Route::middleware('auth:sanctum')->patch('labRequest/payment/{patient}', [LabRequestController::class, 'payment']);
Route::patch('labRequest/cancelPayment/{patient}', [LabRequestController::class, 'cancel']);
Route::patch('labRequest/bankak/{labRequest}', [LabRequestController::class, 'bankak']);
Route::patch('labRequest/hidetest/{labRequest}', [LabRequestController::class, 'hide']);

Route::get('labRequest/{patient}', [LabRequestController::class, 'all']);
Route::delete('labRequest/{labRequest}', [LabRequestController::class, 'destroy']);


Route::middleware('auth:sanctum')->post('client/create', [ClientController::class, 'create']);
Route::middleware('auth:sanctum')->delete('client/{client}', [ClientController::class, 'destroy']);
Route::get('client/all', [ClientController::class, 'index']);

Route::middleware('auth:sanctum')->post('suppliers/create', [SupplierController::class, 'create']);
Route::get('suppliers/all', [SupplierController::class, 'index']);
Route::middleware('auth:sanctum')->delete('suppliers/{supplier}', [SupplierController::class, 'destroy']);
Route::middleware('auth:sanctum')->patch('suppliers/{supplier}', [SupplierController::class, 'update']);


Route::middleware('auth:sanctum')->post('items/create', [ItemController::class, 'create']);
Route::post('item/state/{item_id}', [ItemController::class, 'state']);
Route::post('item/stateByMonth/{item_id}', [ItemController::class, 'stateByMonth']);
Route::middleware('auth:sanctum')->patch('items/{item}', [ItemController::class, 'update']);
Route::get('items/all', [ItemController::class, 'all']);
Route::middleware('auth:sanctum')->get('items/all/pagination/{item}', [ItemController::class, 'pagination']);
Route::get('items/balance', [ItemController::class, 'balance']);
Route::post('items/all/balance/paginate/{page}', [ItemController::class, 'paginate']);
Route::get('items/all/pie/{section}', [ItemController::class, 'pie']);
Route::get('items/all/withItemRemaining', [ItemController::class, 'withItemRemaining']);


Route::post('sections/create', [SectionController::class, 'create']);
Route::get('sections/all', [SectionController::class, 'all']);
Route::delete('sections/{section}', [SectionController::class, 'destroy']);
Route::patch('sections/{section}', [SectionController::class, 'update']);

Route::middleware('auth:sanctum')->post('inventory/deposit', [DepositController::class, 'deposit']);
Route::middleware('auth:sanctum')->delete('inventory/{deposit}', [DepositController::class, 'destroyDeposit']);
Route::controller(DepositController::class)->group(function () {
    Route::prefix('inventory/deposit')->group(function () {

        Route::middleware('auth:sanctum')->post('/complete', 'complete');
        Route::get('/last', 'last');
        Route::delete('/', 'destroy');
        Route::post('getDepositsByDate', 'getDepositsByDate');
        Route::get('getDepositById/{deposit}', 'getDepositById');
        Route::patch('finish/{deposit}', 'finish');
        Route::post('getDepoistByInvoice', 'getDepoistByInvoice');
        Route::post('getDepositBySupplier', 'getDepositBySupplier');
    });

});
Route::middleware('auth:sanctum')->get('balance',[\App\Http\Controllers\PDFController::class,'balance']);


//
Route::middleware('auth:sanctum')->post('inventory/deduct', [DeductController::class, 'deduct']);
Route::get('inventory/deduct/last', [DeductController::class, 'last']);
Route::post('inventory/deduct/item', [DeductController::class, 'destroy']);
Route::post('inventory/deduct/getDeductsByDate', [DeductController::class, 'getDeductsByDate']);
Route::post('inventory/deduct/getDeductsByDate', [DeductController::class, 'getDeductsByDate']);
Route::get('inventory/deduct/showDeductById/{deduct}', [DeductController::class, 'showDeductById']);


Route::post('login', [\App\Http\Controllers\AuthController::class, 'login']);
Route::middleware('auth:sanctum')->post('logout', [\App\Http\Controllers\AuthController::class, 'logout']);
Route::post('signup', [\App\Http\Controllers\AuthController::class, 'signup']);
Route::get('print',[\App\Http\Controllers\PrintThermalController::class,'print']);
