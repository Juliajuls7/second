<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('surname')->default('');
            $table->string('email')->unique();
            $table->string('password');
            $table->integer('sex')->default(0);
            $table->date('DOB')->default('01.01.2000');
            $table->integer('city_id')->unsigned()->default(0);
            $table->string('phone')->default('');
            $table->string('skype')->default('');
            $table->integer('rating')->default(0);
            $table->string('activities')->default('');
            $table->string('skills')->default('');
            $table->integer('education_id')->unsigned()->default(0);
            $table->string('about_myself')->default('');
            $table->integer('role_id')->unsigned()->default(0);
            $table->string('photo')->default('/img/icon_user.png');
            $table->rememberToken();
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
        Schema::dropIfExists('users');
    }
}
