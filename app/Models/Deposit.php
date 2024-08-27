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
//    protected $appends = ['total','totalAmountPaid','totalVatCostMoney','totalCost','totalSell'];

    public function getSummery(){
        $this->totalpaid =  $this->totalPaid();
        $this->totalCost =  $this->totalCost();
        $this->totalSellWithoutVat =  $this->totalSellWithoutVat();
        $this->totalVatCostMoney =  $this->totalVatCostMoney();
        $this->total =  $this->total();
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

    public function totalPaid()
    {
        $total = 0;
        /** @var DepositItem $item */
        foreach ($this->items as $item){
            $total += ($item->item->last_deposit_item->finalCostPrice *$item->quantity);
        }
        return $total;
    }
    public function totalCost()
    {
        $total = 0;
        /** @var DepositItem $item */
        foreach ($this->items as $item){
            $total += ($item->cost *$item->quantity);
        }
        return $total;
    }
    public function totalSellWithoutVat()
    {
        $total = 0;
        /** @var DepositItem $item */
        foreach ($this->items as $item){
            $total += ($item->sell_price *$item->quantity);
        }
        return $total;
    }

    public function totalVatCostMoney()
    {
        $total = 0;
        /** @var DepositItem $item */
        foreach ($this->items as $item){
            $total += ($item->vat_cost * $item->cost / 100) * $item->quantity;
        }
        return $total;
    }




}
