<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
     public function user(){
        return $this->belongsTo('App\User');
    }

     public function subcategory(){
        return $this->belongsTo('App\Subcategory');
    }

    public function category(){
       return $this->belongsTo('App\Category');
   }
      public function comments(){
        return $this->hasMany('App\CommentQuestion');
    }
}
