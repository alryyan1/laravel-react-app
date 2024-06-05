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
 * @mixin \Eloquent
 */
class LabRequest extends Model
{
    use HasFactory;
    protected $table='labRequests';
    public $timestamps = false;
    protected $guarded = [];
    public  function patient(){
        return $this->belongsTo(Patient::class,'pid');
    }
    public function mainTest(){
        return  $this->belongsTo(MainTest::class,'main_test_id');
    }
}