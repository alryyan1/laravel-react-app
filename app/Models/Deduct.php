<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\Deduct
 *
 * @property int $id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Item> $items
 * @property-read int|null $items_count
 * @method static \Illuminate\Database\Eloquent\Builder|Deduct newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Deduct newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Deduct query()
 * @method static \Illuminate\Database\Eloquent\Builder|Deduct whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Deduct whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Deduct whereUpdatedAt($value)
 * @property int $complete
 * @method static \Illuminate\Database\Eloquent\Builder|Deduct whereComplete($value)
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\DeductedItem> $deductedItems
 * @property-read int|null $deducted_items_count
 * @property int $shift_id
 * @property int $payment_type_id
 * @property float $total_amount_received
 * @property-read Deduct|null $deduct
 * @property-read \App\Models\PaymentType $paymentType
 * @property-read \App\Models\Shift $shift
 * @method static \Illuminate\Database\Eloquent\Builder|Deduct wherePaymentTypeId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Deduct whereShiftId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Deduct whereTotalAmountReceived($value)
 * @property int $user_id
 * @property int $number
 * @property-read mixed $total_price
 * @property-read \App\Models\User $user
 * @method static \Illuminate\Database\Eloquent\Builder|Deduct whereNumber($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Deduct whereUserId($value)
 * @property string|null $notes
 * @property int|null $is_sell
 * @property-read mixed $profit
 * @method static \Illuminate\Database\Eloquent\Builder|Deduct whereIsSell($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Deduct whereNotes($value)
 * @property int|null $client_id
 * @property-read \App\Models\Client|null $client
 * @property-read mixed $total_price_unpaid
 * @method static \Illuminate\Database\Eloquent\Builder|Deduct whereClientId($value)
 * @property int $is_postpaid
 * @property int $postpaid_complete
 * @property string|null $postpaid_date
 * @method static \Illuminate\Database\Eloquent\Builder|Deduct whereIsPostpaid($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Deduct wherePostpaidComplete($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Deduct wherePostpaidDate($value)
 * @property float $discount
 * @method static \Illuminate\Database\Eloquent\Builder|Deduct whereDiscount($value)
 * @mixin \Eloquent
 */
class Deduct extends Model
{
    protected $guarded = ['id'];
    use HasFactory;
    protected $with = ['deductedItems','paymentType','user','client'];
    protected $appends = ['total_price','profit','total_price_unpaid','total_paid'];
    public function client()
    {
        return $this->belongsTo(Client::class);

    }
    public function getTotalPriceAttribute()
    {
        return $this->total_price();
    }
    public function getTotalPriceUnpaidAttribute()
    {
        return $this->total_price_unpaid();
    }
    public function getProfitAttribute()
    {
        return $this->profit();
    }
    public function items(){
        return $this->belongsToMany(Item::class,'deducted_items','deduct_id','item_id')->withPivot(['client_id','quantity'])->using(ClientDeductPivot::class);
    }

    public function user(){
        return $this->belongsTo(User::class);
    }

    public function deduct()
    {
        return $this->belongsTo(Deduct::class);
    }

    public function deductedItems()
    {
        return $this->hasMany(DeductedItem::class);
    }

    public function shift()
    {
        return $this->belongsTo(Shift::class);
    }
    public function paymentType()
    {
        return $this->belongsTo(PaymentType::class);
    }
    public function total_price( )
    {

        $total = 0;
        if (!$this->complete)  return 0;

        foreach ($this->deductedItems as $item){


            $strip_price = ($item->price/$item->item->strips);

            $total +=  $item->strips  *   $strip_price ;


        }

        return $total;

    }
    public function getTotalPaidAttribute(){
        return $this->total_paid();
    }
    public function total_paid( )
    {

        $total = 0;
        if (!$this->complete)  return 0;

        foreach ($this->deductedItems as $item){


            $strip_price = ($item->price/$item->item->strips);

            $total +=  $item->strips  *   $strip_price ;


        }

        return $total - $this->discount;

    }
    public function total_price_unpaid( )
    {

        $total = 0;
//        if (!$this->complete)  return 0;

        foreach ($this->deductedItems as $item){


            $strip_price = ($item->price/$item->item->strips);

            $total +=  $item->strips  *   $strip_price ;



        }

        return $total;

    }

    public function profit( )
    {

        $total = 0;
        $cost = 0;
        if (!$this->complete) return 0;
        foreach ($this->deductedItems as $item){



                    $total +=  $item->strips  *  ($item->price/$item->item->strips)  ;
                    $cost +=  $item->strips  *  ($item->item->last_deposit_item?->finalCostPrice/$item->item->strips)  ;


        }

        return $total - $cost;

    }
    public function items_concatinated( )
    {


       return $this->deductedItems->reduce(function ($prev,$current){
           return $prev.'-'.$current->item->market_name.' x '.$current->box;
        },'');


    }
}
