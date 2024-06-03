<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\CompanyRelation
 *
 * @property int $id
 * @property string $name
 * @property float $lab_endurance
 * @property float $service_endurance
 * @property int $company_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|CompanyRelation newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|CompanyRelation newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|CompanyRelation query()
 * @method static \Illuminate\Database\Eloquent\Builder|CompanyRelation whereCompanyId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CompanyRelation whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CompanyRelation whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CompanyRelation whereLabEndurance($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CompanyRelation whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CompanyRelation whereServiceEndurance($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CompanyRelation whereUpdatedAt($value)
 * @property-read \App\Models\Company|null $company
 * @mixin \Eloquent
 */
class CompanyRelation extends Model
{
    use HasFactory;
    protected $fillable = ['name','service_endurance','lab_endurance','company_id'];
    protected $table = 'company_relations';
    public function company(){
        return $this->belongsTo(Company::class);
    }
}
