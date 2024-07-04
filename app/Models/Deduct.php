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
 * @mixin \Eloquent
 */
class Deduct extends Model
{
    protected $guarded = ['id'];
    use HasFactory;
    protected $with = ['deductedItems','paymentType'];
    protected $appends = ['total_price'];
    public function getTotalPriceAttribute()
    {
        return $this->total_price();
    }
    public function items(){
        return $this->belongsToMany(Item::class,'deducted_items','deduct_id','item_id')->withPivot(['client_id','quantity'])->using(ClientDeductPivot::class);
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

        foreach ($this->deductedItems as $item){
            $total +=  $item->price * $item->strips;
        }

        return $total;

    }
}
