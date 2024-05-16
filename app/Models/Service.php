<?php

namespace App\Models;

use AjCastro\EagerLoadPivotRelations\EagerLoadPivotTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    use HasFactory;
    use EagerLoadPivotTrait;
    protected $guarded = ['id'];
//    protected $with = ['service_group'];

    public function service_group(){
        return $this->belongsTo(ServiceGroup::class);
    }
}
