<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\Shipping
 *
 * @property int $id
 * @property int $shipping_item_id
 * @property string $name
 * @property string $phone
 * @property string $express
 * @property string $ctn
 * @property string $cbm
 * @property string $kg
 * @property int|null $shipping_state_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\ShippingItem $item
 * @property-read \App\Models\ShippingState|null $state
 * @method static \Illuminate\Database\Eloquent\Builder|Shipping newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Shipping newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Shipping query()
 * @method static \Illuminate\Database\Eloquent\Builder|Shipping whereCbm($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Shipping whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Shipping whereCtn($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Shipping whereExpress($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Shipping whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Shipping whereKg($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Shipping whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Shipping wherePhone($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Shipping whereShippingItemId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Shipping whereShippingStateId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Shipping whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class Shipping extends Model
{
    protected $guarded = ['id'];
    protected $with = ['item','state'];
    public function item()
    {
        return $this->belongsTo(ShippingItem::class,'shipping_item_id');
    }
    public function state()
    {
        return $this->belongsTo(ShippingState::class,'shipping_state_id');

    }
    use HasFactory;
}
