<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\Contract
 *
 * @property int $id
 * @property string $tenant_name
 * @property string $room_no
 * @property string $building_no
 * @property int $checklist
 * @property string $notes
 * @property int $user_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\ContractState> $states
 * @property-read int|null $states_count
 * @method static \Illuminate\Database\Eloquent\Builder|Contract newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Contract newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Contract query()
 * @method static \Illuminate\Database\Eloquent\Builder|Contract whereBuildingNo($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Contract whereChecklist($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Contract whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Contract whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Contract whereNotes($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Contract whereRoomNo($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Contract whereTenantName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Contract whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Contract whereUserId($value)
 * @mixin \Eloquent
 */
class Contract extends Model
{
    protected $guarded = [];
    use HasFactory;
    protected $with = ['states'];

    public function states(){
        return $this->hasMany(ContractState::class);
    }
}
