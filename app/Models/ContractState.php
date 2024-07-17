<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\ContractState
 *
 * @property int $id
 * @property int $contract_id
 * @property int $state_id
 * @property int $user_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\State|null $state
 * @property-read \App\Models\User|null $user
 * @method static \Illuminate\Database\Eloquent\Builder|ContractState newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|ContractState newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|ContractState query()
 * @method static \Illuminate\Database\Eloquent\Builder|ContractState whereContractId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ContractState whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ContractState whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ContractState whereStateId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ContractState whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ContractState whereUserId($value)
 * @mixin \Eloquent
 */
class ContractState extends Model
{
    use HasFactory;
    protected $guarded = [];
    protected $with = ['state','user'];
    public function state()
    {
        return $this->belongsTo(State::class);
    }
    public function user()
    {
        return $this->belongsTo(User::class);

    }
}
