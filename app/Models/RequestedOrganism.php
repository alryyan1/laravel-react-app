<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\RequestedOrganism
 *
 * @property int $id
 * @property int $lab_request_id
 * @property string $organism
 * @property string $sensitive
 * @property string $resistant
 * @method static \Illuminate\Database\Eloquent\Builder|RequestedOrganism newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|RequestedOrganism newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|RequestedOrganism query()
 * @method static \Illuminate\Database\Eloquent\Builder|RequestedOrganism whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|RequestedOrganism whereLabRequestId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|RequestedOrganism whereOrganism($value)
 * @method static \Illuminate\Database\Eloquent\Builder|RequestedOrganism whereResistant($value)
 * @method static \Illuminate\Database\Eloquent\Builder|RequestedOrganism whereSensitive($value)
 * @mixin \Eloquent
 */
class RequestedOrganism extends Model
{
    protected $guarded =['id'];
    public $timestamps = false;
    use HasFactory;
    public function labRequest(){
        return $this->belongsTo(LabRequest::class);
    }
}
