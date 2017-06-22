<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRatesTable extends Migration
{
    public function up()
    {
      Schema::create('rates', function (Blueprint $table) {
          $table->increments('id');
          $table->integer('value')->unsigned()->default('0');
          $table->integer('user_id')->unsigned();
          $table->timestamps();
      });
    }
    public function down()
    {
      Schema::dropIfExists('rates');
    }
}
