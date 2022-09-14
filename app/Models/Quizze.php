<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Quizze extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function questions(){
        return $this->hasMany('App\Models\Quiz_question' , 'quiz_id');
    }
    public function skills(){
        return $this->hasMany('App\Models\Quiz_Skill' , 'quiz_id');
    }
    public function users(){
        return $this->belongsTo('App\Models\User' , 'user_id');
    }
     public function industry(){
        return $this->belongsTo('App\Models\Industry' , 'category','id');
    }
    
    
}
