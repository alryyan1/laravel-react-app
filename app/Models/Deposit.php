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
 * @mixin \Eloquent
 */
class Deposit extends Model
{
    use HasFactory;

    protected $fillable =['bill_number','bill_date','complete','supplier_id'];
    public function items(){
        return $this->belongsToMany(Item::class,'deposit_items','deposit_id','item_id')->withPivot(['price','quantity']);
    }
    public function supplier(){
        return $this->belongsTo(Supplier::class);
    }
    protected $with =['items','supplier'];



}