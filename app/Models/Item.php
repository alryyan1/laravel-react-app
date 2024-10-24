<?php

namespace App\Models;

use AjCastro\EagerLoadPivotRelations\EagerLoadPivotTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

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
 * @property float $tax
 * @method static \AjCastro\EagerLoadPivotRelations\EagerLoadPivotBuilder|Item whereTax($value)
 * @property-read mixed $last_deposit_item
 * @property-read mixed $total_deposit
 * @property-read mixed $total_out
 * @property-read mixed $total_remaining
 * @property-read \App\Models\DepositItem|null $depositItem
 * @property string $active1
 * @property string $active2
 * @property string $active3
 * @property string $pack_size
 * @property float $approved_rp
 * @method static \AjCastro\EagerLoadPivotRelations\EagerLoadPivotBuilder|Item whereActive1($value)
 * @method static \AjCastro\EagerLoadPivotRelations\EagerLoadPivotBuilder|Item whereActive2($value)
 * @method static \AjCastro\EagerLoadPivotRelations\EagerLoadPivotBuilder|Item whereActive3($value)
 * @method static \AjCastro\EagerLoadPivotRelations\EagerLoadPivotBuilder|Item whereApprovedRp($value)
 * @method static \AjCastro\EagerLoadPivotRelations\EagerLoadPivotBuilder|Item wherePackSize($value)
 * @mixin \Eloquent
 */
class Item extends Model
{
    use HasFactory;
    use EagerLoadPivotTrait;
    protected $guarded = ['id'];
    protected $appends =['lastDepositItem'];
//    protected $appends =['lastDepositItem','totalDeposit','totalOut','totalRemaining'];
    public function getTotalDepositAttribute(){
        return $this->calculateInventory();
    }
    public function getTotalOutAttribute(){
        return $this->totalOut();
    }
    public function getLastDepositItemAttribute(){
        return $this->getLastDepositItem();
    }
    public function getTotalRemainingAttribute(){
        return $this->calculateInventory() - $this->totalOut();
    }
    public function calculateInventory(){
            $total_deposit = DB::table('deposit_items')->select(Db::raw('sum(quantity) as total'))->where('item_id', $this->id)->value('total');
            $total_deduct = DB::table('deducted_items')->select(Db::raw('sum(box) as total'))->where('item_id', $this->id)->value('total');
            $free_qtn = DB::table('deposit_items')->select(Db::raw('sum(free_quantity) as total'))->where('item_id', $this->id)->where('return','=',0)->value('total');
            $item['totaldeduct'] = $total_deduct;
            $item['remaining'] = $total_deposit - $total_deduct;
          return  $total_deposit + $free_qtn - $total_deduct ;
    }
    public function totalOut(){
        return DB::table('deducted_items')->select(Db::raw('sum(box) as total'))->where('item_id', $this->id)->value('total');
    }
    public function getLastDepositItem()
    {
        $depositItem =  DepositItem::where('item_id','=',$this->id)->where('sell_price','>',0)->latest()->first();
        if ($depositItem == null){
            return DepositItem::where('item_id','=',$this->id)->latest()->first();

        }
        return  $depositItem;



    }
    public function getLastDepositItemWithPrice()
    {
    }
    public function depositItem()
    {
        return $this->hasOne(DepositItem::class)->orderByDesc('id')->with('deposit');
    }
    protected $with = ['section','category','type','depositItem'];
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
