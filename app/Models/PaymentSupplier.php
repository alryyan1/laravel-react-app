<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\PaymentSupplier
 *
 * @property-read \App\Models\Supplier|null $supplier
 * @method static \Illuminate\Database\Eloquent\Builder|PaymentSupplier newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|PaymentSupplier newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|PaymentSupplier query()
 * @property int $id
 * @property int $supplier_id
 * @property float $amount
 * @property int $user_id
 * @property string $type_of_payment
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|PaymentSupplier whereAmount($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PaymentSupplier whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PaymentSupplier whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PaymentSupplier whereSupplierId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PaymentSupplier whereTypeOfPayment($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PaymentSupplier whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PaymentSupplier whereUserId($value)
 * @mixin \Eloquent
 */
class PaymentSupplier extends Model
{
    use HasFactory;

    protected $guarded = ['id'];
    public function supplier()
    {
        return $this->belongsTo(Supplier::class);
    }
}
