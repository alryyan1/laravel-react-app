<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SubRoute extends Model
{
    use HasFactory;
    public $timestamps = false;
//    protected $with = ['route'];
    protected $fillable =['name','path','route_id'];
    public function route(){
        return $this->belongsTo(Route::class);
    }

}
