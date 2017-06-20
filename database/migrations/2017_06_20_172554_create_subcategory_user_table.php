<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSubcategoryUserTable extends Migration
{
    public function up()
    {
      Schema::create('subcategory_user', function (Blueprint $table) {
          $table->increments('id');
          $table->integer('subcategory_id')->unsigned();
          $table->integer('user_id')->unsigned();
          $table->string('about');
          $table->timestamps();
      });
    }

    public function down()
    {
        Schema::dropIfExists('subcategory_user');
    }
}
