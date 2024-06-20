<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\RequestedResult
 *
 * @property int $id
 * @property int $patient_id
 * @property int $main_test_id
 * @property int $child_test_id
 * @property string $normal_range
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Patient> $Patients
 * @property-read int|null $patients_count
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\ChildTest> $childTests
 * @property-read int|null $child_tests_count
 * @method static \Illuminate\Database\Eloquent\Builder|RequestedResult newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|RequestedResult newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|RequestedResult query()
 * @method static \Illuminate\Database\Eloquent\Builder|RequestedResult whereChildTestId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|RequestedResult whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|RequestedResult whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|RequestedResult whereMainTestId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|RequestedResult whereNormalRange($value)
 * @method static \Illuminate\Database\Eloquent\Builder|RequestedResult wherePatientId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|RequestedResult whereUpdatedAt($value)
 * @property string $result
 * @method static \Illuminate\Database\Eloquent\Builder|RequestedResult whereResult($value)
 * @property int $lab_request_id
 * @property-read \App\Models\ChildTest|null $childTest
 * @method static \Illuminate\Database\Eloquent\Builder|RequestedResult whereLabRequestId($value)
 * @property-read \App\Models\Patient $patient
 * @mixin \Eloquent
 */
class RequestedResult extends Model
{
    protected $table = 'requested_results';
    protected $guarded = [];
    protected $with = ['childTest'];
    public function childTest(){
        return $this->belongsTo(ChildTest::class);
    }
    public function patient(){
        return $this->belongsTo(Patient::class);
    }
    use HasFactory;

//    public function childTests(){
//        return $this->belongsToMany(ChildTest::class,'requested_results');
//    }
}
