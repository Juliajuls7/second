<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CommentService extends Model
{
   public function user(){
        return $this->belongsTo('App\User');
    }
    public function service(){
        return $this->belongsTo('App\Service');
    }
}
