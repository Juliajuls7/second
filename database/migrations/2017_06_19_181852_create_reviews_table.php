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
          $table->integer('key1')->unsigned()->default(0);//качество
          $table->integer('key2')->unsigned()->default(0);
          $table->integer('key3')->unsigned()->default(0); //вежливость
          $table->text('text');
          $table->timestamps();
      });
    }


    public function down()
    {
      Schema::dropIfExists('reviews');
    }
}
