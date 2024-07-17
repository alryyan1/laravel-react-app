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
 * @property int $require_amount
 * @property int $initial_price
 * @property int $tests
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Deposit> $deposits
 * @property-read int|null $deposits_count
 * @property-read \App\Models\Supplier|null $supplier
 * @method static \Database\Factories\ItemFactory factory($count = null, $state = [])
 * @method static \AjCastro\EagerLoadPivotRelations\EagerLoadPivotBuilder|Item whereInitialPrice($value)
 * @method static \AjCastro\EagerLoadPivotRelations\EagerLoadPivotBuilder|Item whereRequireAmount($value)
 * @method static \AjCastro\EagerLoadPivotRelations\EagerLoadPivotBuilder|Item whereTests($value)
 * @property string $unit
 * @method static \AjCastro\EagerLoadPivotRelations\EagerLoadPivotBuilder|Item whereUnit($value)
 * @property string $expire
 * @property float $cost_price
 * @property float $sell_price
 * @property int|null $drug_category_id
 * @property int|null $pharmacy_type_id
 * @property string|null $barcode
 * @property int $strips
 * @property string $sc_name
 * @property string $market_name
 * @property string|null $batch
 * @property-read \App\Models\DrugCategory|null $category
 * @property-read \App\Models\PharmacyType|null $type
 * @method static \AjCastro\EagerLoadPivotRelations\EagerLoadPivotBuilder|Item whereBarcode($value)
 * @method static \AjCastro\EagerLoadPivotRelations\EagerLoadPivotBuilder|Item whereBatch($value)
 * @method static \AjCastro\EagerLoadPivotRelations\EagerLoadPivotBuilder|Item whereCostPrice($value)
 * @method static \AjCastro\EagerLoadPivotRelations\EagerLoadPivotBuilder|Item whereDrugCategoryId($value)
 * @method static \AjCastro\EagerLoadPivotRelations\EagerLoadPivotBuilder|Item whereExpire($value)
 * @method static \AjCastro\EagerLoadPivotRelations\EagerLoadPivotBuilder|Item whereMarketName($value)
 * @method static \AjCastro\EagerLoadPivotRelations\EagerLoadPivotBuilder|Item wherePharmacyTypeId($value)
 * @method static \AjCastro\EagerLoadPivotRelations\EagerLoadPivotBuilder|Item whereScName($value)
 * @method static \AjCastro\EagerLoadPivotRelations\EagerLoadPivotBuilder|Item whereSellPrice($value)
 * @method static \AjCastro\EagerLoadPivotRelations\EagerLoadPivotBuilder|Item whereStrips($value)
 * @mixin \Eloquent
 */
class Item extends Model
{
    use HasFactory;
    use EagerLoadPivotTrait;
    protected $guarded = ['id'];
    protected $with = ['section','type'];
    public function category()
    {
        return $this->belongsTo(DrugCategory::class,'drug_category_id');
    }
    public function type()
    {
        return $this->belongsTo(PharmacyType::class, 'pharmacy_type_id');
    }
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
