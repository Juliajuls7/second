<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
   public function author(){
        return $this->belongsTo('App\User','author_id','id');
    }
    public function commentservices(){
        return $this->hasMany('App\CommentService');
    }
     public function subcategory(){
        return $this->belongsTo('App\Subcategory');
    }
      public function stateservice(){
        return $this->belongsTo('App\StateService','state_service_id','id');
    }
   public function executor(){
        return $this->belongsTo('App\User','executor_id','id');
    }
    public function review_ex(){
         return $this->hasOne('App\Review','id','review_executor');
     }
     public function review_au(){
          return $this->hasOne('App\Review','review_author','id');
      }
     public function comments(){
        return $this->hasMany('App\CommentService');
     }

}
