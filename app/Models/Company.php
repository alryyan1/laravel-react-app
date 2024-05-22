<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\Company
 *
 * @property int $id
 * @property string $name
 * @property float $lab_endurance
 * @property float $service_endurance
 * @property int $status
 * @property int $lab_roof
 * @property int $service_roof
 * @property string $phone
 * @property string $email
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Service> $services
 * @property-read int|null $services_count
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\MainTest> $tests
 * @property-read int|null $tests_count
 * @method static \Illuminate\Database\Eloquent\Builder|Company newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Company newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Company query()
 * @method static \Illuminate\Database\Eloquent\Builder|Company whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Company whereEmail($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Company whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Company whereLabEndurance($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Company whereLabRoof($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Company whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Company wherePhone($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Company whereServiceEndurance($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Company whereServiceRoof($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Company whereStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Company whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class Company extends Model
{
    use HasFactory;
    protected $fillable = ['name','phone','email','service_endurance','service_roof','lab_endurance','service_cover','lab_roof'];

//    protected $with = ['tests'];

    public function define_tests(){
       $tests =  MainTest::all();
       /** @var MainTest $test */
        foreach ($tests as $test){
           $this->tests()->attach($test->id,['endurance_static'=>0,'endurance_percentage'=>0,'status'=>1,'price'=> $test->price ?? 0,'approve'=>1]);
       }
    }
    public function define_services(){
        $services =  Service::all();
        /** @var Service $test */
        foreach ($services as $service){
            $this->services()->attach($service->id,['static_endurance'=>0,'percentage_endurance'=>0,'price'=> $test->price ?? 0,'static_wage'=>0,'percentage_wage'=>0]);
        }
    }
    public function define_service($service_id){
            $this->services()->attach($service_id,['static_endurance'=>0,'percentage_endurance'=>0,'price'=> $test->price ?? 0,'static_wage'=>0,'percentage_wage'=>0]);
    }

    public function tests(){
        return $this->belongsToMany(MainTest::class,'company_main_test','company_id','main_test_id')->withPivot(['price','endurance_static','endurance_percentage','status','approve']);
    }
    public function services(){
        return $this->belongsToMany(Service::class,'company_service','company_id','service_id')->withPivot(['price','static_endurance','percentage_endurance','static_wage','percentage_wage']);
    }

}
