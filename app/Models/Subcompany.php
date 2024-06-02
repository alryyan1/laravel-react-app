<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\Subcompany
 *
 * @property int $id
 * @property string $name
 * @property float $lab_endurance
 * @property float $service_endurance
 * @property int $company_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|Subcompany newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Subcompany newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Subcompany query()
 * @method static \Illuminate\Database\Eloquent\Builder|Subcompany whereCompanyId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Subcompany whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Subcompany whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Subcompany whereLabEndurance($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Subcompany whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Subcompany whereServiceEndurance($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Subcompany whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class Subcompany extends Model
{
    protected $fillable = ['name','service_endurance','lab_endurance','company_id'];
    protected $table = 'sub_companies';
    public function company(){
        return $this->belongsTo(Company::class);
    }
    use HasFactory;
}
