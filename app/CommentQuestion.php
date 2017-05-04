<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CommentQuestion extends Model
{
    public function user(){
        return $this->belognsTo('App\User');
    }
   
    public function question(){
        return $this->belognsTo('App\Question');
    }
}
