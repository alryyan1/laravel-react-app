<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserRoute extends Model
{
    protected $guarded = [];
    public $timestamps = false;
    protected $with = ['route'];

    use HasFactory;
    public function route(){
       return $this->belongsTo(Route::class);
    }

}
