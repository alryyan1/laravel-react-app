<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\CreditEntry
 *
 * @property int $id
 * @property int $finance_account_id
 * @property int $finance_entry_id
 * @property float $amount
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\FinanceAccount $account
 * @method static \Illuminate\Database\Eloquent\Builder|CreditEntry newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|CreditEntry newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|CreditEntry query()
 * @method static \Illuminate\Database\Eloquent\Builder|CreditEntry whereAmount($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CreditEntry whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CreditEntry whereFinanceAccountId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CreditEntry whereFinanceEntryId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CreditEntry whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CreditEntry whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class CreditEntry extends Model
{
    protected $guarded = [];
    protected $table = 'credit_entries';
    use HasFactory;
    public function account(){
        return $this->belongsTo(FinanceAccount::class,'finance_account_id');
    }
}
