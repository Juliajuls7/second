<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    public function user(){
        return $this->belongsTo('App\User');
    }

    public function subcategory(){
        return $this->belongsTo('App\Subcategory');
    }

     public function comments(){
        return $this->hasMany('App\CommentArticle');
    }
}
