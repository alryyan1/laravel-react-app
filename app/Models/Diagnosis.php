<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\Diagnosis
 *
 * @property int $id
 * @property string $name
 * @method static \Illuminate\Database\Eloquent\Builder|Diagnosis newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Diagnosis newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Diagnosis query()
 * @method static \Illuminate\Database\Eloquent\Builder|Diagnosis whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Diagnosis whereName($value)
 * @mixin \Eloquent
 */
class Diagnosis extends Model
{
    use HasFactory;
    protected $table = 'diagnosis';
}
