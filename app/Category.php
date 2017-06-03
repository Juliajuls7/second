<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
     public function subcategories(){
        return $this->hasMany('App\Subcategory');
    }

    // public function questions(){
    //     return $this->hasMany('App\Question');
    // }

    public static function getCategories(){
      return static::all();
    }
}
