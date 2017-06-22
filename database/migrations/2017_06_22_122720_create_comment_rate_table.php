<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCommentRateTable extends Migration
{
    public function up()
    {
      Schema::create('comment_question_rate', function (Blueprint $table) {
          $table->increments('id');
          $table->integer('comment_question_id')->unsigned();
          $table->integer('rate_id')->unsigned();
          $table->timestamps();
      });
    }

    public function down()
    {
        Schema::dropIfExists('comment_question_rate');
    }
}
