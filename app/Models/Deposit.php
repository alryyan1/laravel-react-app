<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\Deposit
 *
 * @property int $id
 * @property int $supplier_id
 * @property string $bill_number
 * @property string $bill_date
 * @property int $complete
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Item> $items
 * @property-read int|null $items_count
 * @property-read \App\Models\Supplier $supplier
 * @method static \Illuminate\Database\Eloquent\Builder|Deposit newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Deposit newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Deposit query()
 * @method static \Illuminate\Database\Eloquent\Builder|Deposit whereBillDate($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Deposit whereBillNumber($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Deposit whereComplete($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Deposit whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Deposit whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Deposit whereSupplierId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Deposit whereUpdatedAt($value)
 * @property int $paid
 * @property int|null $user_id
 * @property-read mixed $total
 * @property-read \App\Models\User|null $user
 * @method static \Illuminate\Database\Eloquent\Builder|Deposit wherePaid($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Deposit whereUserId($value)
 * @property string $payment_method
 * @property float $discount
 * @method static \Illuminate\Database\Eloquent\Builder|Deposit whereDiscount($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Deposit wherePaymentMethod($value)
 * @property-read mixed $total_amount_paid
 * @mixin \Eloquent
 */
class Deposit extends Model
{
    use HasFactory;

    protected $fillable =['bill_number','bill_date','complete','supplier_id','user_id','paid','discount'];

    public function user()
    {
        return $this->belongsTo(User::class);

    }
    public function items(){
//        return $this->belongsToMany(Item::class,'deposit_items','deposit_id','item_id')->withPivot(['price','quantity']);
        return $this->hasMany(DepositItem::class)->orderByDesc('id');
    }
    public function supplier(){
        return $this->belongsTo(Supplier::class);
    }
//    protected $with =['items','supplier','user'];
    protected $with =['supplier','user'];
//    protected $appends = ['purchaseSummery'];
    public function getTotalAmountPaidAttribute(){
        return $this->totalPaid();
    }


    function getTotalAttribute()
    {
        return $this->total();
    }

    public function total()
    {
        $total = 0;
        /** @var DepositItem $item */
        foreach ($this->items as $item){
            $total += ($item->price*$item->quantity);
        }
        return $total;
    }
//

    public function purchaseSummery()
    {
        $totalFinalPrice = 0;
        $totalSellWithoutVat = 0;
        $costWithOutVat = 0;
        $totalCostWithVat = 0;
        $totalRetailWithVat= 0 ;
        $profit = 0;
        $totalVatCost = 0;
        $totalRetailWithOutVat = 0;
        /** @var DepositItem $item */
        foreach ($this->items as $item){
            $costWithOutVat += ($item->cost *$item->quantity);
            $totalCostWithVat += ($item->item->last_deposit_item->finalCostPrice *$item->quantity);

            $totalRetailWithVat += ($item->item->last_deposit_item->finalSellPrice *$item->quantity);
            $totalRetailWithOutVat += ($item->item->last_deposit_item->finalSellPrice *$item->quantity);
            $totalVatCost += ($item->vat_cost * $item->cost / 100) * $item->quantity;
            $totalSellWithoutVat += ($item->sell_price *$item->quantity);
            $profit +=   $totalRetailWithVat - $totalCostWithVat;
        }
        $this->costWithOutVat = $costWithOutVat ;
        $this->CostWithVat = $totalCostWithVat ;
        $this->discountedMoney = $totalCostWithVat * $this->discount / 100 ;
        $this->totalVatCost = $totalVatCost ;
        $this->totalSellWithoutVat = $totalSellWithoutVat ;
        $this->profit = $profit ;
        return $this;
    }





}
