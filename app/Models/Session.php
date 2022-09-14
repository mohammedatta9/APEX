<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Session extends Model
{
    use HasFactory;
    protected $guarded = [];
    
     public function session_times(){
        return $this -> hasMany('App\Models\Session_time','session_id','id');
    }
}
