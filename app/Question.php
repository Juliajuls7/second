<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
     public function user(){
        return $this->belognsTo('App\User');
    }
    
     public function subcategory(){
        return $this->belongsTo('App\Subcategory');
    }
      public function commentquestions(){
        return $this->hasMany('App\CommentQuestion');
    }
}
