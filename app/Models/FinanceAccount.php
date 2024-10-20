<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\FinanceAccount
 *
 * @property int $id
 * @property string $name
 * @property int $account_category_id
 * @property int $debit
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\AccountCategory $AccountCategory
 * @method static \Illuminate\Database\Eloquent\Builder|FinanceAccount newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|FinanceAccount newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|FinanceAccount query()
 * @method static \Illuminate\Database\Eloquent\Builder|FinanceAccount whereAccountCategoryId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|FinanceAccount whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|FinanceAccount whereDebit($value)
 * @method static \Illuminate\Database\Eloquent\Builder|FinanceAccount whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|FinanceAccount whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|FinanceAccount whereUpdatedAt($value)
 * @property string|null $description
 * @method static \Illuminate\Database\Eloquent\Builder|FinanceAccount whereDescription($value)
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\CreditEntry> $credits
 * @property-read int|null $credits_count
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\DebitEntry> $debits
 * @property-read int|null $debits_count
 * @mixin \Eloquent
 */
class FinanceAccount extends Model
{
    protected $guarded =  ['id'];
    protected $table ='finance_accounts';
    protected $with = ['accountCategory','credits','debits'];
    use HasFactory;
    public function AccountCategory()
    {
        return $this->belongsTo(AccountCategory::class);
    }
    public function debits()
    {
        return $this->hasMany(DebitEntry::class);
    }
    public function credits()
    {
        return $this->hasMany(CreditEntry::class);
    }
}
