<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateStateServicesTable extends Migration
{
    public function up()
    {
        Schema::create('state_services', function (Blueprint $table) {
            $table->increments('id');
             $table->string('name');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('state_services');
    }
}
