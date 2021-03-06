<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CommentQuestion extends Model
{
    public function user(){
        return $this->belongsTo('App\User');
    }
    public function question(){
        return $this->belongsTo('App\Question');
    }
    public function rates(){
        return $this->belongsToMany('App\Rate');
    }
}
