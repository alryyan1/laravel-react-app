<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\MedicalDrugRoute
 *
 * @property int $id
 * @property string $name
 * @method static \Illuminate\Database\Eloquent\Builder|MedicalDrugRoute newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|MedicalDrugRoute newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|MedicalDrugRoute query()
 * @method static \Illuminate\Database\Eloquent\Builder|MedicalDrugRoute whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|MedicalDrugRoute whereName($value)
 * @mixin \Eloquent
 */
class MedicalDrugRoute extends Model
{
    protected $guarded = ['id'];
    use HasFactory;
    public $timestamps = false;
    protected $table = 'medical_drug_routes';
}
