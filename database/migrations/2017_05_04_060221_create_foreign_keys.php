<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateForeignKeys extends Migration
{

    public function up()
    {
      //  Schema::table('users', function (Blueprint $table) {
      //       $table->foreign('city_id')->references('id')->on('cities');
      //       $table->foreign('role_id')->references('id')->on('roles');
      //     //  $table->foreign('education_id')->references('id')->on('educations');
       //
      //   });
      //  Schema::table('cities', function (Blueprint $table) {
      //      $table->foreign('region_id')->references('id')->on('regions');
       //
      //   });
      //   Schema::table('questions', function (Blueprint $table) {
      //      $table->foreign('user_id')->references('id')->on('users');
      //      $table->foreign('subcategory_id')->references('id')->on('subcategories');
      //   });
       //
      //  Schema::table('comment_questions', function (Blueprint $table) {
      //      $table->foreign('user_id')->references('id')->on('users');
      //      $table->foreign('question_id')->references('id')->on('questions');
      //  });
       //
      //   Schema::table('comment_articles', function (Blueprint $table) {
      //      $table->foreign('user_id')->references('id')->on('users');
      //      $table->foreign('article_id')->references('id')->on('articles');
      //    });
       //
      //  Schema::table('comment_services', function (Blueprint $table) {
      //      $table->foreign('user_id')->references('id')->on('users');
      //      $table->foreign('service_id')->references('id')->on('services');
      //  });
       //
      //  Schema::table('articles', function (Blueprint $table) {
      //      $table->foreign('user_id')->references('id')->on('users');
      //      $table->foreign('subcategory_id')->references('id')->on('subcategories');
      //   });
       //
      //  Schema::table('services', function (Blueprint $table) {
      //      $table->foreign('author_id')->references('id')->on('users');
      //      $table->foreign('subcategory_id')->references('id')->on('subcategories');
      //      $table->foreign('state_service_id')->references('id')->on('state_services');
      //      $table->foreign('executor_id')->references('id')->on('users');
      //      $table->foreign('review_author')->references('id')->on('reviews');
      //      $table->foreign('review_executor')->references('id')->on('reviews');
      //      $table->foreign('state_service_id')->references('id')->on('state_services');
      //  });
       //
      //  Schema::table('subcategories', function (Blueprint $table) {
      //      $table->foreign('category_id')->references('id')->on('categories');
      //  });
      //  Schema::table('subcategory_user', function (Blueprint $table) {
      //      $table->foreign('subcategory_id')->references('id')->on('subcategories');
      //      $table->foreign('user_id')->references('id')->on('users');
      //  });
      //  Schema::table('rates', function (Blueprint $table) {
      //      $table->foreign('user_id')->references('id')->on('users');
      //  });
      //  Schema::table('article_rate', function (Blueprint $table) {
      //      $table->foreign('rate_id')->references('id')->on('rates');
      //      $table->foreign('article_id')->references('id')->on('articles');
      //  });
      //  Schema::table('comment_question_rate', function (Blueprint $table) {
      //      $table->foreign('rate_id')->references('id')->on('rates');
      //      $table->foreign('comment_questions_id')->references('id')->on('articles');
      //  });
    }

    public function down()
    {

    }
}
