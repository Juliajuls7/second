<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];


    protected $hidden = [
        'password', 'remember_token',
    ];

    public function questions(){
        return $this->hasMany('App\Question');
    }
    public function role(){
        return $this->belongsTo('App\Role');
    }
    public function city(){
        return $this->belongsTo('App\City');
    }

     public function articles(){
        return $this->hasMany('App\Article');
    }

     public function services(){
        return $this->hasMany('App\Service','author_id','id');
    }
    public function doneservices(){
        return $this->hasMany('App\Service','executor_id','id');
    }
     public function commentquestions(){
        return $this->hasMany('App\CommentQuestion');
    }
     public function commentarticles(){
        return $this->hasMany('App\CommentArticle');
    }
     public function commentservices(){
        return $this->hasMany('App\CommentService');
    }
    public function education(){
       return $this->belongsTo('App\Education');
   }
     public function subcategories(){
         return $this->belongsToMany('App\Subcategory');
     }


}
