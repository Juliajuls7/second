<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CommentArticle extends Model
{
    public function user(){
        return $this->belongsTo('App\User');
    }
    public function article(){
        return $this->belongsTo('App\Article');
    }
}
