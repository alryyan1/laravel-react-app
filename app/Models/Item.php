<?php

namespace App\Models;

use AjCastro\EagerLoadPivotRelations\EagerLoadPivotTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\Item
 *
 * @property int $id
 * @property int $section_id
 * @property string $name
 * @property string $unit_name
 * @property string $initial_balance
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\Section $section
 * @method static \Illuminate\Database\Eloquent\Builder|Item newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Item newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Item query()
 * @method static \Illuminate\Database\Eloquent\Builder|Item whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Item whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Item whereInitialBalance($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Item whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Item whereSectionId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Item whereUnitName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Item whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class Item extends Model
{
    use HasFactory;
    use EagerLoadPivotTrait;
    protected $fillable =['name','section_id','initial_balance','initial_price','require_amount'];
    protected $with = ['section'];
    public function section(){
        return $this->belongsTo(Section::class);
    }
    public function deposits(){
        return $this->belongsToMany(Deposit::class,'deposit_items',"item_id","deposit_id");
    }
    public function supplier(){
        return $this->belongsTo(Supplier::class);
    }

}
