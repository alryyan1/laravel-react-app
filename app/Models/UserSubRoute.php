<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserSubRoute extends Model
{
    use HasFactory;
    protected $with =['sub_route'];
    protected $guarded = [];
    public $timestamps = false;
    public function sub_route(){
        return $this->belongsTo(SubRoute::class);
    }

}
