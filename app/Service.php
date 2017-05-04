<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
   public function author(){
        return $this->belognsTo('App\User','id','author_id');
    }
    public function commentservices(){
        return $this->hasMany('App\CommentService');
    }
   
     public function subcategory(){
        return $this->belongsTo('App\Subcategory');
    }
      public function stateservice(){
        return $this->belongsTo('App\Stateservice');
    }
    
    
   public function executor(){
        return $this->belongsTo('App\User','id','executor_id');
    }
}
