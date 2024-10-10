<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\ChemwellController;
use App\Http\Controllers\ChildGroupController;
use App\Http\Controllers\ChildOptionController;
use App\Http\Controllers\childTestController;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\CompanyController;
use App\Http\Controllers\CompanyRelationController;
use App\Http\Controllers\ContainerController;
use App\Http\Controllers\ContractController;
use App\Http\Controllers\CostController;
use App\Http\Controllers\CountryController;
use App\Http\Controllers\DeductController;
use App\Http\Controllers\deductedItemController;
use App\Http\Controllers\DepositController;
use App\Http\Controllers\DoctorController;
use App\Http\Controllers\DoctorShiftController;
use App\Http\Controllers\DrugCategoryController;
use App\Http\Controllers\DrugController;
use App\Http\Controllers\DrugMedicalRouteController;
use App\Http\Controllers\FinanceController;
use App\Http\Controllers\ItemController;
use App\Http\Controllers\LabRequestController;
use App\Http\Controllers\MainTestController;
use App\Http\Controllers\PatientController;
use App\Http\Controllers\PDFController;
use App\Http\Controllers\PermissionController;
use App\Http\Controllers\PharmacyTypeController;
use App\Http\Controllers\PrintThermalController;
use App\Http\Controllers\RequestedResultController;
use App\Http\Controllers\RequestedServiceController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\SectionController;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\ServiceGroupController;
use App\Http\Controllers\SettingController;
use App\Http\Controllers\ShiftController;
use App\Http\Controllers\ShippingController;
use App\Http\Controllers\ShippingItemController;
use App\Http\Controllers\ShippingStateController;
use App\Http\Controllers\SpecialistController;
use App\Http\Controllers\SubCompanyController;
use App\Http\Controllers\SupplierController;
use App\Http\Controllers\UnitController;
use App\Http\Controllers\UserController;
use App\Http\Requests\StorePatientRequest;
use App\Models\Package;
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

Route::get('country',[CountryController::class,'index']);
Route::post('country',[CountryController::class,'store']);
Route::get('calculateInventory/{item}',[ItemController::class,'calculateInventory']);

Route::get('ledger/{account_id}',[FinanceController::class,'ledger']);
Route::get('financeEntries',[FinanceController::class,'financeEntries']);
Route::get('debits',[FinanceController::class,'debits']);
Route::get('credits',[FinanceController::class,'credits']);
Route::post('createFinanceEntries',[FinanceController::class,'createFinanceEntries']);

Route::get('financeAccounts',[FinanceController::class,'index']);
Route::delete('financeAccounts/{financeAccount}',[FinanceController::class,'destroy']);
Route::post('createFinanceAccount',[FinanceController::class,'createFinanceAccount']);

Route::post('financeSections',[FinanceController::class,'createSection']);
Route::patch('financeSections/{accountCategory}',[FinanceController::class,'editSection']);
Route::get('financeSections',[FinanceController::class,'getSections']);

Route::post('addServiceCost/{service}', [ServiceController::class, 'addServiceCost']);
Route::post('updateServiceCost/{serviceCost}', [ServiceController::class, 'updateServiceCost']);
Route::delete('removeServiceCost/{serviceCost}', [ServiceController::class, 'removeServiceCost']);
Route::get('file/{patient}',[PatientController::class,'file']);
Route::post('addOrganism/{labRequest}',[LabRequestController::class,'addOrganism']);
Route::patch('editOrganism/{requestedOrganism}',[LabRequestController::class,'editOrganism']);
Route::delete('deleteOrganism/{requestedOrganism}',[LabRequestController::class,'deleteOrganism']);
Route::get('expireMonthPanel',[ItemController::class,'expireMonthPanel']);
Route::get('expiredItems',[ItemController::class,'expiredItems']);
Route::get('complains',[PatientController::class,'complains']);
Route::get('diagnosis',[PatientController::class,'diagnosis']);
Route::middleware('auth:sanctum')-> patch('depositItems/update/{depositItem}',[DepositController::class,'updateDepositItem']);
Route::middleware('auth:sanctum')-> post('income-item/bulk/{deposit}',[DepositController::class,'defineAllItemsToDeposit']);

Route::post('generateSickLeave/{patient}',[PatientController::class,'sickleave']);
Route::patch('sickleave/{sickleave}',[PatientController::class,'editSickLeave']);


Route::middleware('auth:sanctum')-> post('addStateToContract',[ContractController::class,'addStateToContract']);
Route::middleware('auth:sanctum')-> post('states',[ContractController::class,'createState']);
Route::middleware('auth:sanctum')-> get('states',[ContractController::class,'getStates']);
Route::middleware('auth:sanctum')-> post('contracts',[ContractController::class,'store']);
Route::middleware('auth:sanctum')->get('contracts/all/pagination/{item}', [ContractController::class, 'pagination']);


Route::middleware('auth:sanctum')-> patch('update/{user}',[UserController::class,'update']);
Route::middleware('auth:sanctum')-> patch('routes',[UserController::class,'editRoutes']);
Route::middleware('auth:sanctum')-> patch('subRoutes',[UserController::class,'editSubRoutesRoutes']);
Route::middleware('auth:sanctum')-> get('routes',[UserController::class,'routes']);
Route::middleware('auth:sanctum')-> get('totalUserLabTotalAndBank',[ShiftController::class,'totalUserLabTotalAndBank']);
Route::middleware('auth:sanctum')-> get('monthlyIncome',[ShiftController::class,'monthlyIncome']);
Route::middleware('auth:sanctum')->get('getUserTotalLabBank',[ShiftController::class,'totalUserLabBank']);
Route::middleware('auth:sanctum')->get('getShiftByDate',[ShiftController::class,'getShiftByDate']);

Route::middleware('auth:sanctum')->delete('items/{item}', [ItemController::class, 'destroy']);
Route::middleware('auth:sanctum')->delete('deduct/{deduct}', [DeductController::class, 'deleteDeduct']);
Route::middleware('auth:sanctum')->post('searchDeductsByDate', [DeductController::class, 'searchDeductsByDate']);

Route::middleware('auth:sanctum')->patch('deduct/payment/{deduct}', [DeductController::class, 'payment']);
Route::middleware('auth:sanctum')->get('inventory/deduct/complete/{deduct}', [DeductController::class, 'complete']);
Route::middleware('auth:sanctum')->get('inventory/deduct/cancel/{deduct}', [DeductController::class, 'cancel']);
Route::middleware('auth:sanctum')->get('inventory/deduct/new', [DeductController::class, 'newDeduct']);

Route::middleware('auth:sanctum')->patch('deduct/{deduct}', [DeductController::class, 'update']);

Route::middleware('auth:sanctum')->post('addDrugForSell',[ItemController::class,'addSell']);
Route::middleware('auth:sanctum')->post('addPrescribedDrug/{patient}',[ItemController::class,'addPrescribtion']);
Route::middleware('auth:sanctum')->patch('deductedItem/{deductedItem}',[deductedItemController::class,'update']);
Route::middleware('auth:sanctum')->delete('inventory/deduct/{deductedItem}', [deductedItemController::class, 'destroy']);

Route::middleware('auth:sanctum')->post('drugs',[DrugController::class,'store']);


Route::post('pharmacyTypes',[PharmacyTypeController::class,'store']);
Route::get('pharmacyTypes',[PharmacyTypeController::class,'index']);

Route::get('drugCategory',[DrugCategoryController::class,'index']);
Route::post('drugCategory',[DrugCategoryController::class,'store']);

Route::middleware('auth:sanctum')->post('settings',[SettingController::class,'update']);
Route::middleware('auth:sanctum')->post('updateUserSettings',[SettingController::class,'updateUserSettings']);
Route::get('settings',[SettingController::class,'index']);
Route::middleware('auth:sanctum')->get('userSettings',[SettingController::class,'userSettings']);



Route::middleware('auth:sanctum')->post('populate/denos',[UserController::class,'populateDenos']);
Route::middleware('auth:sanctum')->patch('deno/user',[UserController::class,'updateDenoUser']);
Route::middleware('auth:sanctum')->post('user/denos',[UserController::class,'denosByLastShift']);

Route::get('result',[PDFController::class,'result']);
Route::get('printLab',[PDFController::class,'printLab']);
Route::get('printBarcode',[PDFController::class,'printBarcode']);
Route::middleware('auth:sanctum')->get('printReception',[PDFController::class,'printReception']);
Route::get('printSale',[PDFController::class,'printSale']);
Route::get('getChemistryColumnNames',[RequestedResultController::class,'Chemistry']);
Route::post('populateMindrayMatchingTable',[RequestedResultController::class,'populateMindrayMatchingTable']);
Route::get('getChemistryBindings',[RequestedResultController::class,'getChemistryBindings']);
Route::patch('updateChemistryBindings/{chemistryBinder}',[RequestedResultController::class,'updateChemistryBindings']);
Route::post('populatePatientChemistryData/{patient}',[RequestedResultController::class,'populatePatientChemistryData']);
Route::get('chemistry',[MainTestController::class,'chemistry']);



Route::post('populatePatientCbcData/{patient}',[RequestedResultController::class,'populatePatientCbcData']);
Route::post('populatePatientCbc5Data/{patient}',[RequestedResultController::class,'populatePatientCbc5Data']);
Route::get('getSysmexColumnNames',[RequestedResultController::class,'sysmexColumnNames']);
Route::post('populateCBCMatchingTable',[RequestedResultController::class,'populate']);
Route::post('populateCBC5MatchingTable',[RequestedResultController::class,'populateCbc5Bindings']);
Route::get('getCbcBindings',[RequestedResultController::class,'getCbcBindings']);
Route::get('getCbc5Bindings',[RequestedResultController::class,'getCbc5Bindings']);
Route::patch('updateCbcBindings/{cbcBinder}',[RequestedResultController::class,'updateCbcBindings']);



Route::get('getHormoneTests',[MainTestController::class,'hormone']);
Route::get('getImmuneTests',[MainTestController::class,'immune']);

Route::post('populatePatientHormoneData/{patient}',[RequestedResultController::class,'populatePatientHormoneData']);
Route::get('getHormoneColumnNames',[RequestedResultController::class,'hormoneColumnNames']);
Route::post('populateHormoneMatchingTable',[RequestedResultController::class,'populateHormoneMatchingTable']);
Route::get('getHormoneBindings',[RequestedResultController::class,'getHormoneBindings']);
Route::patch('updateHormoneBindings/{hormoneBinder}',[RequestedResultController::class,'updateHormoneBindings']);



Route::patch('requestedResult/{requestedResult}',[RequestedResultController::class,'save']);
Route::patch('requestedResult/normalRange/{requestedResult}',[RequestedResultController::class,'edit']);
Route::patch('comment/{labRequest}',[RequestedResultController::class,'comment']);
Route::post('requestedResult/default/{labRequest}',[RequestedResultController::class,'default']);
//cost
Route::middleware('auth:sanctum')->post("cost",[CostController::class,'store']);
Route::middleware('auth:sanctum')->delete("cost/{cost}",[CostController::class,'destroy']);
Route::middleware('auth:sanctum')->post("cost/general",[CostController::class,'addGeneralCost']);
Route::middleware('auth:sanctum')->get("costs",[CostController::class,'costs']);


Route::middleware('auth:sanctum')->post("costCategory",[\App\Http\Controllers\CostCategoryController::class,'store']);
Route::middleware('auth:sanctum')->get("costCategory",[\App\Http\Controllers\CostCategoryController::class,'index']);

Route::get("users",[UserController::class,'all']);
Route::patch("user/roles/{user}",[UserController::class,'editRole']);

Route::get('shifts',[ShiftController::class,'all']);

//roles
Route::post("roles",[RoleController::class,'store']);
Route::delete("roles/{role}",[RoleController::class,'destroy']);
Route::get("roles",[RoleController::class,'all']);
Route::patch("roles/{role}",[RoleController::class,'edit']);

Route::get("permissions",[PermissionController::class,'all']);
Route::post("permissions",[PermissionController::class,'store']);



//shipping-items
Route::post('addShippingState',[ShippingStateController::class, 'addShippingState']);
Route::get('shippingState/all',[ShippingStateController::class, 'all']);
Route::post('addShipItem',[ShippingItemController::class, 'addShipItem']);
Route::post('addShipping',[ShippingController::class, 'addShipping']);
Route::patch('shipping/{shipping}',[ShippingController::class, 'update']);
Route::get('shipping/paginate/{page?}',[ShippingController::class, 'pagination']);
Route::get('shipItems/all',[ShippingItemController::class, 'all']);
Route::get('shipping/find/{shipping}',[ShippingController::class, 'find']);

Route::patch('editChildTestGroup/{child_test}',[childTestController::class,'editChildGroup']);
Route::get('childGroup',[ChildGroupController::class,'all']);
Route::post('childGroup',[ChildGroupController::class,'store']);
Route::get('childTestOption/{childTest}',[ChildOptionController::class,'all']);
Route::patch('childTestOption/{childTestOption}',[ChildOptionController::class,'update']);
Route::delete('childTestOption/{childTestOption}',[ChildOptionController::class,'destroy']);
Route::post('childTestOption/{childTest}',[ChildOptionController::class,'store']);
Route::patch('child_tests/{childTest}',[MainTestController::class,'updateChildTest']);
Route::patch('mainTest/{main_test}',[MainTestController::class,'update']);
Route::post('mainTest',[MainTestController::class,'store']);
Route::delete('maintest/{main_test}',[MainTestController::class,'destroy']);
Route::get('mainTestById/{id}',[MainTestController::class,'getbyid']);

Route::delete('childTest/{childTest}',[childTestController::class,'destroy']);
Route::post('childTest/create/{main_test}',[childTestController::class,'store']);
Route::get('containers/all',[ContainerController::class,'all']);
Route::get('units/all',[UnitController::class,'all']);
Route::post('units',[UnitController::class,'store']);

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {

    return $request->user();
});



//doctors
Route::patch('doctor/{doctor}', [DoctorController::class, 'update']);
Route::post('doctors/{doctor}/services', [DoctorController::class, 'addDoctorService']);
Route::patch('doctor/service/{doctorService}', [DoctorController::class, 'updateDoctorService']);
Route::delete('doctors/doctor/{doctor_service}', [DoctorController::class, 'deleteDoctorService']);

Route::middleware('auth:sanctum')->get('doctor/shift/open/{doctor}',[DoctorShiftController::class,'open']);
Route::middleware('auth:sanctum')->get('doctor/shift/close/{shift}',[DoctorShiftController::class,'close']);
Route::middleware('auth:sanctum')->get('doctor/openShifts/{shift_id?}/{last?}/{open?}',[DoctorShiftController::class, 'DoctorShifts']);
Route::middleware('auth:sanctum')->get('doctor/openedDoctorsShifts/{shift_id?}/{last?}/{open?}',[DoctorShiftController::class, 'openedDoctorsShifts']);
Route::middleware('auth:sanctum')->post('doctorVisitsByDate',[DoctorShiftController::class, 'doctorVisitsByDate']);
Route::middleware('auth:sanctum')->get('doctor/byLastUnifiedShift',[DoctorShiftController::class, 'LastShift']);
Route::get('doctors', [DoctorController::class, 'all']);
Route::patch('doctors/{doctor}', [DoctorController::class, 'update']);
Route::post('doctors/add', [DoctorController::class, 'create']);
Route::get('doctors/pagination/{page_size}', [DoctorController::class, 'pagination']);
Route::get('doctors/find/{doctor}', [DoctorController::class, 'find']);
Route::get('doctorShift/find', [DoctorShiftController::class, 'find']);


//specialists
Route::get('specialists/all', [SpecialistController::class, 'all']);
Route::post('specialists/add', [SpecialistController::class, 'store']);
Route::patch('specialists/{specialist}', [SpecialistController::class, 'update']);

//Route::get('lab/money', [ShiftController::class, 'total']);
Route::middleware('auth:sanctum')->get('service/money', [ShiftController::class, 'totalService']);
Route::middleware('auth:sanctum')->get('service/money/bank', [ShiftController::class, 'totalServiceBank']);
Route::get('shift/last', [ShiftController::class, 'last']);
Route::get('shiftById/{shift}', [ShiftController::class, 'shiftById']);
Route::post('shift/status/{shift}', [ShiftController::class, 'status']);

Route::get('tests', [MainTestController::class, 'show']);
Route::get('packages/all', function () {
    return Package::with('tests')->get();
});
Route::middleware('auth:sanctum')->get('patient/sampleCollected/{patient}', [PatientController::class, 'collectSample']);
Route::middleware('auth:sanctum')->get('printLock/{patient}', [PatientController::class, 'printLock']);
Route::middleware('auth:sanctum')->get('patients', [PatientController::class, 'byName']);
Route::middleware('auth:sanctum')->get('todayPatients', [PatientController::class, 'todayPatients']);
Route::middleware('auth:sanctum')->patch('prescribedDrugs/{prescribedDrug}', [PatientController::class, 'prescribedDrugUpdate']);
Route::middleware('auth:sanctum')->delete('prescribedDrugs/{prescribedDrug}', [PatientController::class, 'prescribedDrugDelete']);
Route::middleware('auth:sanctum')->post('patients/add/{isLab?}', [PatientController::class, 'store']);
Route::middleware('auth:sanctum')->post('/patients/add-patient-by-history/{doctor}/{patient}', [PatientController::class, 'book']);
Route::middleware('auth:sanctum')->post('/patients/add-patient-by-history-lab/{patient}/{doctor?}', [PatientController::class, 'saveByHistoryLab']);
Route::middleware('auth:sanctum')->post('patients/reception/add/{doctor}/{patient_id?}', [PatientController::class, 'book']);


//companies

Route::post('relation/create/{company}', [CompanyRelationController::class, 'store']);
Route::patch('copyContract', [CompanyController::class, 'copy']);
Route::post('subcompany/create/{company}', [SubCompanyController::class, 'store']);
Route::get('subcompany/all', [SubCompanyController::class, 'all']);
Route::get('relation/all', [CompanyRelationController::class, 'all']);
Route::patch('subcompany/{subcompany}', [SubCompanyController::class, 'update']);
Route::patch('relation/{companyRelation}', [CompanyRelationController::class, 'update']);
Route::post('company/create', [CompanyController::class, 'create']);
Route::get('company/all', [CompanyController::class, 'all']);
Route::get('company/all/pagination/{company}', [CompanyController::class, 'pagination']);
Route::patch('company/{company}', [CompanyController::class, 'update']);
Route::patch('company/test/{company}', [CompanyController::class, 'updatePivot']);
Route::patch('company/service/{company}', [CompanyController::class, 'updatePivotService']);


Route::get('profitAndLoss/{page}',[ItemController::class,'profitAndLoss']);
Route::post('profitAndLoss/{page}',[ItemController::class,'profitAndLoss']);
Route::get('topSales',[ItemController::class,'topSales']);



Route::post('service/create', [ServiceController::class, 'create']);
Route::delete('service/{service}', [ServiceController::class, 'destroy']);
Route::get('service/all', [ServiceController::class, 'all']);
Route::get('service/all/pagination/{page}', [ServiceController::class, 'pagination']);
Route::patch('service/{service}', [ServiceController::class, 'update']);
Route::patch('service/test/{service}', [ServiceController::class, 'updatePivot']);

Route::middleware('auth:sanctum')->delete('requestedService/{requestedService}', [RequestedServiceController::class, 'deleteService']);
Route::middleware('auth:sanctum')->patch('requestedService/pay/{requestedService}', [RequestedServiceController::class, 'pay']);
Route::middleware('auth:sanctum')->patch('requestedService/bank/{requestedService}', [RequestedServiceController::class, 'bank']);
Route::middleware('auth:sanctum')->patch('requestedService/discount/{requestedService}', [RequestedServiceController::class, 'discount']);
Route::middleware('auth:sanctum')->patch('requestedService/cancel/{requestedService}', [RequestedServiceController::class, 'cancel']);
Route::middleware('auth:sanctum')->post('patient/service/add/{doctorvisit}', [RequestedServiceController::class, 'addService']);
Route::middleware('auth:sanctum')->patch('requestedService/count/{requestedService}',[RequestedServiceController::class,'count']);
Route::middleware('auth:sanctum')->patch('editRequested/{requestedService}',[RequestedServiceController::class,'editRequested']);

Route::get('serviceGroup/all', [ServiceGroupController::class, 'all']);
Route::post('serviceGroup/create', [ServiceGroupController::class, 'create']);
Route::patch('serviceGroup/{serviceGroup}', [ServiceGroupController::class, 'update']);

Route::patch('patient/service/count/{patient}',[ServiceController::class,'count']);
Route::post('patient/search', [PatientController::class, 'search']);
Route::post('patient/search/phone', [PatientController::class, 'searchByphone']);
Route::post('patient/copy/{doctor}/{patient_id}/{copy?}', [PatientController::class, 'book']);
Route::get('patient/{patient}', [PatientController::class, 'get']);
Route::patch('patients/edit/{doctorvisit}', [PatientController::class, 'edit']);
Route::get('patient/visit/{doctorvisit}', [PatientController::class, 'doctorVisit']);
Route::get('doctorvisit/find', [PatientController::class, 'findDoctorVisit']);
Route::patch('doctorVisit/{doctorVisit}', [PatientController::class, 'updateDoctorVisit']);
Route::get('findPatient/{patient}', [PatientController::class, 'findPatient']);

Route::get('resultFinished/{patient}', [PatientController::class, 'resultFinished']);
Route::get('labFinishedNotifications', [PatientController::class, 'labFinishedNotifications']);
Route::get('removeLabFinishedNotifications/{patient}', [PatientController::class, 'removeLabFinishedNotifications']);

Route::get('newPatient/{patient}', [PatientController::class, 'newPatient']);
Route::get('NewPatients', [PatientController::class, 'NewPatients']);
Route::get('removeNewPatient/{patient}', [PatientController::class, 'removeNewPatients']);

Route::patch('updateTable',[PatientController::class,'updateTable']);

Route::middleware('auth:sanctum')->patch('patients/{patient}', [PatientController::class, 'update']);
Route::get('patient/barcode/{patient}', [PatientController::class, 'printBarcode']);
Route::middleware('auth:sanctum')->post('labRequest/add/{doctorVisit}', [LabRequestController::class, 'store']);
Route::middleware('auth:sanctum')->post('lab/add/{patient}', [LabRequestController::class, 'storeLab']);
Route::middleware('auth:sanctum')->patch('labRequest/{labRequest}/{doctorVisit}', [LabRequestController::class, 'edit']);
Route::middleware('auth:sanctum')->patch('labRequest/{labRequest}', [LabRequestController::class, 'labDiscount']);
Route::middleware('auth:sanctum')->patch('payment/{doctorVisit}', [LabRequestController::class, 'payment']);
Route::middleware('auth:sanctum')->patch('lab/payment/{patient}', [LabRequestController::class, 'labPayment']);


Route::middleware('auth:sanctum')->patch('cancelPayment/{doctorVisit}', [LabRequestController::class, 'cancel']);
Route::middleware('auth:sanctum')->patch('cancelPaymentLab/{patient}', [LabRequestController::class, 'cancelLab']);


Route::patch('labRequest/bankak/{labRequest}/{doctorVisit}', [LabRequestController::class, 'bankak']);
Route::patch('lab/bank/{labRequest}', [LabRequestController::class, 'bankLab']);
Route::patch('hidetest/{labRequest}', [LabRequestController::class, 'hide']);

Route::get('labRequest/{patient}', [LabRequestController::class, 'all']);
Route::get('drugMedicalRoutes', [DrugMedicalRouteController::class, 'index']);
Route::post('drugMedicalRoutes', [DrugMedicalRouteController::class, 'store']);
Route::patch('drugMedicalRoutes/{prescribedDrug}', [DrugMedicalRouteController::class, 'edit']);
Route::delete('labRequest/{labRequest}/{doctorVisit}', [LabRequestController::class, 'destroy']);
Route::delete('deleteLab/labRequest/{labRequest}', [LabRequestController::class, 'destroyLab']);


Route::middleware('auth:sanctum')->post('client/create', [ClientController::class, 'create']);
Route::middleware('auth:sanctum')->delete('client/{client}', [ClientController::class, 'destroy']);
Route::get('client/all', [ClientController::class, 'index']);

Route::middleware('auth:sanctum')->post('suppliers/create', [SupplierController::class, 'create']);
Route::get('suppliers/all', [SupplierController::class, 'index']);
Route::middleware('auth:sanctum')->delete('suppliers/{supplier}', [SupplierController::class, 'destroy']);
Route::middleware('auth:sanctum')->patch('suppliers/{supplier}', [SupplierController::class, 'update']);


Route::middleware('auth:sanctum')->post('items/create', [ItemController::class, 'create']);
Route::middleware('auth:sanctum')->get('items/find/{item}', [ItemController::class, 'find']);
Route::post('item/state/{item_id}', [ItemController::class, 'state']);
Route::post('item/stateByMonth/{item_id}', [ItemController::class, 'stateByMonth']);
Route::middleware('auth:sanctum')->patch('items/{item}', [ItemController::class, 'update']);
Route::get('items/all', [ItemController::class, 'all']);
Route::middleware('auth:sanctum')->get('items/all/pagination/{item}', [ItemController::class, 'pagination']);
Route::middleware('auth:sanctum')->get('deposit/items/all/pagination/{deposit}', [ItemController::class, 'depositItemsPagination']);
Route::get('items/balance', [ItemController::class, 'balance']);
Route::post('items/all/balance/paginate/{page}', [ItemController::class, 'paginate']);
Route::get('items/all/pie/{section}', [ItemController::class, 'pie']);
Route::get('items/all/withItemRemaining', [ItemController::class, 'withItemRemaining']);


Route::post('sections/create', [SectionController::class, 'create']);
Route::get('sections/all', [SectionController::class, 'all']);
Route::delete('sections/{section}', [SectionController::class, 'destroy']);
Route::patch('sections/{section}', [SectionController::class, 'update']);
Route::get('chemwell', [ChemwellController::class, 'read']);

Route::middleware('auth:sanctum')->post('defineItemToLastDeposit/{item}', [DepositController::class, 'defineItemToLastDeposit']);
Route::middleware('auth:sanctum')->delete('depositItem/{depositItem}', [DepositController::class, 'destroy']);
Route::middleware('auth:sanctum')->post('inventory/itemDeposit/{deposit}', [DepositController::class, 'deposit']);
Route::middleware('auth:sanctum')->get('depositSummery/{deposit}', [DepositController::class, 'depositSummery']);

Route::middleware('auth:sanctum')->delete('inventory/{deposit}', [DepositController::class, 'destroyDeposit']);
Route::middleware('auth:sanctum')->get('getDepositWithItems/{deposit}', [DepositController::class, 'getDepositWithItems']);
Route::middleware('auth:sanctum')->get('getDepositWithItemsAndSummery/{deposit}', [DepositController::class, 'getDepositWithItemsAndSummery']);
Route::controller(DepositController::class)->group(function () {
    Route::prefix('inventory/deposit')->group(function () {

        Route::middleware('auth:sanctum')->post('/newDeposit', 'newDeposit');
        Route::get('/last', 'last');
        Route::patch('pay/{deposit}', 'pay');
        Route::get('/all', 'allDeposits');
        Route::post('getDepositsByDate', 'getDepositsByDate');
        Route::get('getDepositById/{deposit}', 'getDepositById');
        Route::patch('finish/{deposit}', 'finish');
        Route::post('getDepoistByInvoice', 'getDepoistByInvoice');
        Route::post('getDepositBySupplier', 'getDepositBySupplier');
        Route::patch('update/{deposit}', 'updateDeposit');
    });

});
Route::middleware('auth:sanctum')->get('balance',[PDFController::class,'balance']);


//
Route::middleware('auth:sanctum')->post('addToDeduct/{deduct}', [DeductController::class, 'deduct']);

Route::middleware('auth:sanctum')->post('inventory/deduct', [DeductController::class, 'deduct']);
Route::get('inventory/deduct/last', [DeductController::class, 'last']);
Route::post('inventory/deduct/item', [DeductController::class, 'destroy']);
Route::post('inventory/deduct/getDeductsByDate', [DeductController::class, 'getDeductsByDate']);
Route::post('inventory/deduct/getDeductsByDate', [DeductController::class, 'getDeductsByDate']);
Route::get('inventory/deduct/showDeductById/{deduct}', [DeductController::class, 'showDeductById']);


Route::post('login', [AuthController::class, 'login']);
Route::middleware('auth:sanctum')->post('logout', [AuthController::class, 'logout']);
Route::post('signup', [AuthController::class, 'signup']);
Route::get('print',[PrintThermalController::class,'print']);
