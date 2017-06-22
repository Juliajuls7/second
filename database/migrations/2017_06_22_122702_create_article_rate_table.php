<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateArticleRateTable extends Migration
{
    public function up()
    {
      Schema::create('article_rate', function (Blueprint $table) {
          $table->increments('id');
          $table->integer('article_id')->unsigned();
          $table->integer('rate_id')->unsigned();
          $table->timestamps();
      });
    }

    public function down()
    {
      Schema::dropIfExists('article_rate');
    }
}
