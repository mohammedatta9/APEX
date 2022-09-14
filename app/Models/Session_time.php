<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Session_time extends Model
{
    use HasFactory;

    protected $guarded = [];
    
protected $dates = ['time_from','time_to'];

    public function sp_session(){
        return $this -> hasOne('App\Models\Sp_session','sp_session_id','id');
      }
}
