<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\LabRequest
 *
 * @property int $main_test_id
 * @property int $pid
 * @property int $hidden
 * @property int $is_lab2lab
 * @property int $valid
 * @property int $no_sample
 * @property float $price
 * @property float $amount_paid
 * @property int $discount_per
 * @property int $is_bankak
 * @property string|null $comment
 * @method static \Illuminate\Database\Eloquent\Builder|LabRequest newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|LabRequest newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|LabRequest query()
 * @method static \Illuminate\Database\Eloquent\Builder|LabRequest whereAmountPaid($value)
 * @method static \Illuminate\Database\Eloquent\Builder|LabRequest whereComment($value)
 * @method static \Illuminate\Database\Eloquent\Builder|LabRequest whereDiscountPer($value)
 * @method static \Illuminate\Database\Eloquent\Builder|LabRequest whereHidden($value)
 * @method static \Illuminate\Database\Eloquent\Builder|LabRequest whereIsBankak($value)
 * @method static \Illuminate\Database\Eloquent\Builder|LabRequest whereIsLab2lab($value)
 * @method static \Illuminate\Database\Eloquent\Builder|LabRequest whereMainTestId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|LabRequest whereNoSample($value)
 * @method static \Illuminate\Database\Eloquent\Builder|LabRequest wherePid($value)
 * @method static \Illuminate\Database\Eloquent\Builder|LabRequest wherePrice($value)
 * @method static \Illuminate\Database\Eloquent\Builder|LabRequest whereValid($value)
 * @property-read \App\Models\MainTest $mainTest
 * @property-read \App\Models\Patient $patient
 * @property int $id
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\RequestedResult> $requested_results
 * @property-read int|null $requested_results_count
 * @method static \Illuminate\Database\Eloquent\Builder|LabRequest whereId($value)
 * @property-read mixed $name
 * @property int|null $user_requested
 * @property int|null $user_deposited
 * @method static \Illuminate\Database\Eloquent\Builder|LabRequest whereUserDeposited($value)
 * @method static \Illuminate\Database\Eloquent\Builder|LabRequest whereUserRequested($value)
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\RequestedOrganism> $requested_organisms
 * @property-read int|null $requested_organisms_count
 * @mixin \Eloquent
 */
class LabRequest extends Model
{

    use HasFactory;
    protected $table='labRequests';
    public $timestamps = false;
    protected $with = ['requested_results','mainTest','unfinished_results_count','requested_organisms'];
    protected $guarded = [];
    protected $appends = ['name'];
    public function requested_organisms()
    {
        return $this->hasMany(RequestedOrganism::class);
    }
    public function getNameAttribute(){
        return $this->mainTest->main_test_name;
    }
    public  function patient(){
        return $this->belongsTo(Patient::class,'pid');
    }
    public function mainTest(){
        return  $this->belongsTo(MainTest::class,'main_test_id');
    }
    public function requested_results(){
        return $this->hasMany(RequestedResult::class);
    }
    public function unfinished_results_count()
    {
        return  $this->requested_results()->where('result','=','');

    }


}
