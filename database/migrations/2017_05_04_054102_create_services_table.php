<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateServicesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('services', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('author_id')->unsigned();
            $table->integer('flag');//задание или услуга
            $table->integer('subcategory_id')->unsigned();
            $table->string('head');
            $table->string('text');
            $table->dateTime('t_finish')->default(\Carbon\Carbon::now());
            $table->dateTime('t_start')->default(\Carbon\Carbon::now());
            $table->integer('state_service_id')->unsigned();//состояние задания
            $table->integer('executor_id')->unsigned()->default(0);//кто выполнил
	          $table->integer('rating');
            $table->integer('remote');//удаленная
            $table->string('files')->default('');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('services');
    }
}
