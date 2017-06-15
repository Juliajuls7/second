<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCommentArticlesTable extends Migration
{
    public function up()
    {
        Schema::create('comment_articles', function (Blueprint $table) {
            $table->increments('id');
            $table->string('text');
            $table->integer('user_id')->unsigned();

            $table->integer('article_id')->unsigned();

            $table->integer('rating');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('comment_articles');
    }
}
