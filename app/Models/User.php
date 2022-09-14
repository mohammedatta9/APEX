<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = [
        'first_name',
        'last_name',
        'slug',
        'email',
        'type_id',
        'last_login',
        'password',
        'image',
        'dob',
        'gender',
        'address',
        'phone',
        'country',
        'city'
    ];


    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function type(){
        return $this->belongsTo('App\Models\User_type' , 'type_id' , 'id');
    }
     public function languages(){
        return $this -> hasMany('App\Models\User_language','user_id','id');
    }
    public function specializations(){
        return $this -> hasMany('App\Models\User_specialization','user_id','id');
    }

    public function qualifications(){
        return $this -> hasMany('App\Models\User_qualification','user_id','id');
    }
    public function skills(){
        return $this -> hasMany('App\Models\User_skill','user_id','id');
    }
    public function session(){
        return $this -> hasMany('App\Models\Session','user_id','id');
    }
    public function community_posts(){
        return $this -> hasMany('App\Models\Community_post','user_id','id');
    }
    public function articles(){
        return $this -> hasMany('App\Models\Article','user_id','id');
    }
    public function sp_session(){
        return $this -> hasMany('App\Models\Sp_session','mentor_id','id');
    }
    public function industry(){
        return $this->belongsTo('App\Models\Industry' , 'industry' , 'id');
    } 
    public function  participates(){
        return $this -> hasMany('App\Models\Student_session','student_id','id');
    }
     public function  applications(){
        return $this -> hasMany('App\Models\Student_session','session_by','id');
    }
     public function  quizze(){
        return $this -> hasMany('App\Models\Quizze','user_id','id');
    }
    public function reviews()
    {
        return $this->hasMany(Review::class);
    }
    
}
