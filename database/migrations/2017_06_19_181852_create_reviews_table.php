<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateReviewsTable extends Migration
{
    public function up()
    {
      Schema::create('reviews', function (Blueprint $table) {
          $table->increments('id');
          $table->integer('quality');//качество
          $table->integer('price');
          $table->integer('politeness'); //вежливость
          $table->integer('speed');
          $table->text('text');
          $table->timestamps();
      });
    }


    public function down()
    {
      Schema::dropIfExists('reviews');
    }
}
