<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Subcategory extends Model
{
    public function questions(){
        return $this->hasMany('App\Question');
    }
     public function articles(){
        return $this->hasMany('App\Article');
    }
     public function services(){
        return $this->hasMany('App\Service');
    }
    public function category(){
        return $this->belongsTo('App\Category');
    }

}
