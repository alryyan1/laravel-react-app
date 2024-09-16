<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\DepositItem
 *
 * @property int $id
 * @property int $item_id
 * @property int $deposit_id
 * @property int $quantity
 * @property float $price
 * @property string|null $batch
 * @property string|null $expire
 * @property string|null $notes
 * @property string|null $barcode
 * @property int $user_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\Deposit $deposit
 * @property-read \App\Models\Item $item
 * @property-read \App\Models\User $user
 * @method static \Illuminate\Database\Eloquent\Builder|DepositItem newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|DepositItem newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|DepositItem query()
 * @method static \Illuminate\Database\Eloquent\Builder|DepositItem whereBarcode($value)
 * @method static \Illuminate\Database\Eloquent\Builder|DepositItem whereBatch($value)
 * @method static \Illuminate\Database\Eloquent\Builder|DepositItem whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|DepositItem whereDepositId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|DepositItem whereExpire($value)
 * @method static \Illuminate\Database\Eloquent\Builder|DepositItem whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|DepositItem whereItemId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|DepositItem whereNotes($value)
 * @method static \Illuminate\Database\Eloquent\Builder|DepositItem wherePrice($value)
 * @method static \Illuminate\Database\Eloquent\Builder|DepositItem whereQuantity($value)
 * @method static \Illuminate\Database\Eloquent\Builder|DepositItem whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|DepositItem whereUserId($value)
 * @property int|null $return
 * @method static \Illuminate\Database\Eloquent\Builder|DepositItem whereReturn($value)
 * @property float $cost
 * @property float $sell_price
 * @property float $vat_cost
 * @property float $vat_sell
 * @property int $free_quantity
 * @property-read mixed $final_sell_price
 * @method static \Illuminate\Database\Eloquent\Builder|DepositItem whereCost($value)
 * @method static \Illuminate\Database\Eloquent\Builder|DepositItem whereFreeQuantity($value)
 * @method static \Illuminate\Database\Eloquent\Builder|DepositItem whereSellPrice($value)
 * @method static \Illuminate\Database\Eloquent\Builder|DepositItem whereVatCost($value)
 * @method static \Illuminate\Database\Eloquent\Builder|DepositItem whereVatSell($value)
 * @property-read mixed $final_cost_price
 * @mixin \Eloquent
 */
class DepositItem extends Model
{
    protected $guarded = ['id'];
    protected $appends =['finalSellPrice','finalCostPrice'];
    public function getFinalSellPriceAttribute(){
        return ($this->vat_sell * $this->sell_price)/100  + $this->sell_price;

    }

    public function getFinalCostPriceAttribute(){
        return ($this->vat_cost * $this->cost)/100  + $this->cost;

    }
    use HasFactory;
//    protected $with = ['deposit'];
    public function item()
    {
        return $this->belongsTo(Item::class);
    }
    public function user(){
        return $this->belongsTo(User::class);
    }
    public function deposit()
    {
        return $this->belongsTo(Deposit::class);
    }
}
