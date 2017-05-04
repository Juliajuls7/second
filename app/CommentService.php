<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CommentService extends Model
{
   public function user(){
        return $this->belognsTo('App\User');
    }
    
    
    public function service(){
        return $this->belognsTo('App\Service');
    }
}
