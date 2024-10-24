<?php

namespace App\Http\Controllers;

use App\Models\AccountCategory;
use App\Models\CreditEntry;
use App\Models\DebitEntry;
use App\Models\FinanceAccount;
use App\Models\FinanceEntry;
use Illuminate\Http\Request;

class FinanceController extends Controller
{
    public function ledger($account_id)
    {
        $entries =  FinanceEntry::all();
        $data = [];

        foreach ($entries as $entry) {
            if ($entry->from_account != $account_id && $entry->to_account != $account_id) {
                continue;
            }
            $arr = [];
            if ($entry->from_account == $account_id) {
                $arr['debit'] = $entry->amount;
            }
            if ($entry->to_account == $account_id) {
                $arr['credit'] = $entry->amount;
            }
            $arr['date'] = $entry->created_at;
            $arr['description'] = $entry->description;
            $arr['id'] = $entry->id;
            $data[] = $arr;
        }
        return response()->json($data);
    }
    public function index(Request $request)
    {
        return FinanceAccount::with(['credits.account','debits.account'])->get();
    }
    public function financeEntries(Request $request)
    {
        return FinanceEntry::with(['debit.account', 'credit.account'])->get();
    }
    public function debits(Request $request)
    {
        return DebitEntry::with(['account'])->get();
    }
    public function credits(Request $request)
    {
        return CreditEntry::with(['account'])->get();
    }
    public function createFinanceEntries(Request $request)
    {
         $financeEntry = FinanceEntry::create([
             'description'=>$request->get('description'),
         ]);



         DebitEntry::create([
             'amount'=>$request->get('amount'),
             'finance_account_id'=>$request->get('debit'),
             'finance_entry_id'=>$financeEntry->id,
         ]);
        CreditEntry::create([
            'amount'=>$request->get('amount'),
            'finance_account_id'=>$request->get('credit'),
            'finance_entry_id'=>$financeEntry->id,
        ]);
        return ['status'=> true,'data'=>$financeEntry->load(['debit.account', 'credit.account'])];

    }
    public function destroy(Request $request ,FinanceAccount $financeAccount)
    {
        return ['status'=>$financeAccount->delete()];
    }
    public function createFinanceAccount(Request $request)
    {
        $data = FinanceAccount::create($request->all());
        return ['status'=> true,'data'=>$data->fresh()];
    }
    public function createSection(Request $request)
    {
        return ['status'=>AccountCategory::create($request->all())];
    }
    public function editSection(Request $request,AccountCategory $accountCategory)
    {
        $data = $request->all();
        return ['status' => $accountCategory->update([$data['colName'] => $data['val']])];

    }
    public function getSections(Request $request)
    {
        return AccountCategory::all();
    }
}
