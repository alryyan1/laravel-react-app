<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\PharmacyType
 *
 * @property int $id
 * @property string $name
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|PharmacyType newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|PharmacyType newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|PharmacyType query()
 * @method static \Illuminate\Database\Eloquent\Builder|PharmacyType whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PharmacyType whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PharmacyType whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PharmacyType whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class PharmacyType extends Model
{
    protected $fillable = ['name'];
    use HasFactory;
}
