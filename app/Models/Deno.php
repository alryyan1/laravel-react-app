<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Deno extends Model
{
    public $timestamps = false;
    protected $fillable =['name'];
    protected $table = 'cash_tally';
    public function users()
    {
       return $this->belongsToMany(User::class,'denos_users','deno_id','user_id');
    }
    use HasFactory;
}
