<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CommentArticle extends Model
{
    public function user(){
        return $this->belognsTo('App\User');
    }
    public function article(){
        return $this->belognsTo('App\Article');
    }
}
