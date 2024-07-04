<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\DrugCategory
 *
 * @property int $id
 * @property string $name
 * @method static \Illuminate\Database\Eloquent\Builder|DrugCategory newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|DrugCategory newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|DrugCategory query()
 * @method static \Illuminate\Database\Eloquent\Builder|DrugCategory whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|DrugCategory whereName($value)
 * @mixin \Eloquent
 */
class DrugCategory extends Model
{
    protected $fillable = ['name'];
    use HasFactory;
    public $timestamps = false;
}
