<?php

namespace App\Http\Controllers;

use App\Models\Deduct;
use App\Models\DoctorShift;
use App\Models\Patient;
use App\Models\Shift;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Query\Builder;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ShiftController extends Controller
{

    public function shiftSummery(Request $request,Shift $shift)
    {
        return $shift->summary();
    }
    public function deductSummery(Request $request, Shift $shift){
       return $shift->deductSummary();

    }
    public function all(Request $request){
        return Shift::all();
    }
    public function totalUserLab(Request $request){
        $user = auth()->user();
        $shift = Shift::orderByDesc('id')->first();
        return $shift->paidLab($user->id);
    }
    public function totalUserLabBank(Request $request){
        $user = auth()->user();
        $shift = Shift::orderByDesc('id')->first();
        return $shift->bankakLab($user->id);
    }
    public function totalUserLabTotalAndBank(Request $request){
        $user = auth()->user();
        $shift = Shift::orderByDesc('id')->first();
        return ['bank'=>$shift->bankakLab($user->id),'total'=>$shift->paidLab($user->id)];
    }
    public function getShiftByDate( Request $request){
        $date_selected =  $request->get('date');
//        return Carbon::parse($date_selected)->startOfDay();
        return Shift::with(['doctorShifts','doctorShifts.doctor'])->whereDate('created_at','=',$date_selected)->get();
    }
    public function status(Request  $request  , Shift $shift)
    {
       $status =  $request->get('status');
       if ($status){
           $shift = Shift::create();
       }else{
           $shifts =  DoctorShift::all()->where('status',1)->all();
           /** @var DoctorShift $shift */
           foreach ($shifts as $shift){
               $shift->status = 0;
                $shift->save();
           }
           $shift->update(['is_closed' => 1,'closed_at' => now()]);
       }
       return ['status' => true, 'data' => $shift->fresh()];
    }
    public function shiftWith(Request $request ){
         $shift = Shift::orderByDesc('id')->first();
         $with=  $request->get('with');
        return $shift->load([$with => function ( $query){
            $query->orderByDesc('id');
        }]);
    }
    public function last()
    {
        $shift = Shift::with(['deducts'])->orderByDesc('id')->first();
        return ['status' => true, 'data' => $shift ];

    }public function shiftById(Request $request , Shift $shift)
    {

        return ['status' => true, 'data' => $shift];

    }
    public function test(Request $request,$age,$name){
        return [$age,$name];
    }

    public function total(){
        $shift = Shift::orderByDesc('id')->first();
        return ['status'=> true, 'total'=>$shift->total_paid_services()];
    }
    public function totalService(){
         $user =  auth()->user();
        /** @var Shift $shift */
        $shift = Shift::orderByDesc('id')->first();
        return ['status'=> true, 'total'=>$shift->totalPaidService($user->id)];
    }
    public function totalServiceBank(){
        $user =  auth()->user();
        /** @var Shift $shift */
        $shift = Shift::orderByDesc('id')->first();
        return ['status'=> true, 'total'=>$shift->totalPaidServiceBank($user->id)];
    }

    public function create(){
        Shift::create([]);
    }
    public function monthlyIncome()
    {
        $month = \Illuminate\Support\Carbon::now()->month;
        $now =  Carbon::now();
        $now2 =  Carbon::now();
        $start_date =  $now->setMonth($month)->setDay(1);
        $end_date = $now2->setMonth($month)->lastOfMonth();
        $start_date_f = $start_date->format('Ymd');
        $dates = [];
        $summary = [];
            $pdo = DB::getPdo();
        while ($start_date <= $end_date) {
            $start_date_f = $start_date->format('Ymd');

            $rows = $pdo->query("select * from shifts where date(created_at) = '$start_date_f' ")->rowCount();

            $data = $pdo->query("select * from shifts where date(created_at) = '$start_date_f' ")->fetchAll();
            $total_clinic = 0 ;
            $total_lab = 0 ;
            $total_cost = 0;
            $obj = [];
            foreach ($data as $da) {

                $id = $da['id'];
                $shift = Shift::find($id);
                $total_cost = $shift->totalCost();
                $total_lab+= $shift->totalLab();
                $total_clinic += $shift->totalPaidService();


            }
            $obj['totalLab'] = $total_lab;
            $obj['totalClinic'] = $total_clinic;
            $obj['total_cost'] = $total_cost;
            $obj['shifts'] = $rows;
            $obj['date'] = $start_date->format('Y-m-d');
            $summary[] = $obj;
            $start_date->addDay();


        }
        return ['month'=>$month,'start'=>$start_date,'end'=>$end_date,'summary'=>$summary,'date_formated'=>$start_date_f];

    }


}
