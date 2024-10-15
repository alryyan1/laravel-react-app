<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\Cost
 *
 * @property int $id
 * @property int $shift_id
 * @property int|null $doctor_shift_id
 * @property string|null $description
 * @property string|null $comment
 * @property int $amount
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|Cost newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Cost newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Cost query()
 * @method static \Illuminate\Database\Eloquent\Builder|Cost whereAmount($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Cost whereComment($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Cost whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Cost whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Cost whereDoctorShiftId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Cost whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Cost whereShiftId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Cost whereUpdatedAt($value)
 * @property int|null $user_cost
 * @method static \Illuminate\Database\Eloquent\Builder|Cost whereUserCost($value)
 * @property-read \App\Models\User|null $user
 * @property int|null $cost_category_id
 * @property-read \App\Models\CostCategory|null $costCategory
 * @method static \Illuminate\Database\Eloquent\Builder|Cost whereCostCategoryId($value)
 * @mixin \Eloquent
 */
class Cost extends Model
{
    protected $guarded = ['id'];
    protected $with = ['user','costCategory'];
    public function user(){
        return $this->belongsTo(User::class,'user_cost');
    }
    public function costCategory(){
        return $this->belongsTo(CostCategory::class);
    }
    use HasFactory;
}
