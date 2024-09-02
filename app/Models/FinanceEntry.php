<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\FinanceEntry
 *
 * @property int $id
 * @property int|null $from_account
 * @property int|null $to_account
 * @property string $description
 * @property float $amount
 * @property int $transfer
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|FinanceEntry newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|FinanceEntry newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|FinanceEntry query()
 * @method static \Illuminate\Database\Eloquent\Builder|FinanceEntry whereAmount($value)
 * @method static \Illuminate\Database\Eloquent\Builder|FinanceEntry whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|FinanceEntry whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|FinanceEntry whereFromAccount($value)
 * @method static \Illuminate\Database\Eloquent\Builder|FinanceEntry whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|FinanceEntry whereToAccount($value)
 * @method static \Illuminate\Database\Eloquent\Builder|FinanceEntry whereTransfer($value)
 * @method static \Illuminate\Database\Eloquent\Builder|FinanceEntry whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class FinanceEntry extends Model
{
    protected $guarded  =['id'];
    use HasFactory;
    protected $table = 'finance_entries';
    protected $with = ['debit','credit'];
    public function debit(){
        return $this->hasMany(DebitEntry::class);
    }
    public function credit(){
        return $this->hasMany(CreditEntry::class);
    }



}
