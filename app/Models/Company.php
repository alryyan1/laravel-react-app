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
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Subcompany> $sub_companies
 * @property-read int|null $sub_companies_count
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\CompanyRelation> $relations
 * @property-read int|null $relations_count
 * @mixin \Eloquent
 */
class Company extends Model
{
    use HasFactory;
    protected $fillable = ['name','phone','email','service_endurance','service_roof','lab_endurance','service_cover','lab_roof'];

    protected $with = ['relations','sub_companies'];

    public function define_tests(Company $company_from = null,Company $to = null){
        if ($company_from){
            $tests =  $company_from->tests;

        }else{
            $tests =  MainTest::all();

        }
       /** @var MainTest $test */
        foreach ($tests as $test){
            if ($company_from){
                $to->tests()->updateExistingPivot($test->id,['endurance_static'=>0,'endurance_percentage'=>0,'status'=>1,'price'=> $test->price ?? 0,'approve'=>0]);

            }else{

                $this->tests()->attach($test->id,['endurance_static'=>0,'endurance_percentage'=>0,'status'=>1,'price'=> $test->price ?? 0,'approve'=>0]);

            }
       }
    }
    public function define_services(Company $company_from = null,Company $to = null){
        if ($company_from){
            $services =  $company_from->services;

        }else{
            $services =  Service::all();

        }
        /** @var Service $service */
        foreach ($services as $service){
            if ($company_from){
                $to->services()->updateExistingPivot($service->id,['static_endurance'=>0,'percentage_endurance'=>0,'price'=> $service->price ?? 0,'static_wage'=>0,'percentage_wage'=>0]);

            }else{
                $this->services()->attach($service->id,['static_endurance'=>0,'percentage_endurance'=>0,'price'=> $service->price ?? 0,'static_wage'=>0,'percentage_wage'=>0]);

            }
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
    public function sub_companies()
    {
        return $this->hasMany(Subcompany::class);
    }
    public function relations(){
        return $this->hasMany(CompanyRelation::class);
    }
}
