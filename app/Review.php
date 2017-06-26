<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Review extends Model
{
  public function service(){
     return $this->belongsTo('App\Service');
 }
 public function ser_executor(){
    return $this->belongsTo('App\Service','id','review_executor');
 }
 public function ser_author(){
    return $this->belongsTo('App\Service','id','review_author');
 }
}
