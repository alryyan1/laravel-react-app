<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\DeductedItem
 *
 * @property int $id
 * @property int $deduct_id
 * @property int $item_id
 * @property int|null $client_id
 * @property int $quantity
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|DeductedItem newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|DeductedItem newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|DeductedItem query()
 * @method static \Illuminate\Database\Eloquent\Builder|DeductedItem whereClientId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|DeductedItem whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|DeductedItem whereDeductId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|DeductedItem whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|DeductedItem whereItemId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|DeductedItem whereQuantity($value)
 * @method static \Illuminate\Database\Eloquent\Builder|DeductedItem whereUpdatedAt($value)
 * @property int $shift_id
 * @property int $user_id
 * @property int $strips
 * @property int $box
 * @property float $price
 * @property-read \App\Models\Client|null $client
 * @property-read \App\Models\Deduct $deduct
 * @property-read \App\Models\Item $item
 * @method static \Illuminate\Database\Eloquent\Builder|DeductedItem whereBox($value)
 * @method static \Illuminate\Database\Eloquent\Builder|DeductedItem wherePrice($value)
 * @method static \Illuminate\Database\Eloquent\Builder|DeductedItem whereShiftId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|DeductedItem whereStrips($value)
 * @method static \Illuminate\Database\Eloquent\Builder|DeductedItem whereUserId($value)
 * @property int $discount
 * @method static \Illuminate\Database\Eloquent\Builder|DeductedItem whereDiscount($value)
 * @mixin \Eloquent
 */
class DeductedItem extends Model
{
    protected $guarded =['id'];
    protected $with = ['item','client'];
    public function client()
    {
        return $this->belongsTo(Client::class);
    }
    public function item()
    {
        return $this->belongsTo(Item::class);
    }
    public function deduct()
    {
        return $this->belongsTo(Deduct::class);
    }
    use HasFactory;
}
