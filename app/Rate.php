<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Rate extends Model
{
  public function articles(){
      return $this->belongsToMany('App\Аrticle');
  }
  public function comments(){
      return $this->belongsToMany('App\CommentQuestion');
  }
  public function user(){
      return $this->belongsTo('App\User');
  }
  
}
