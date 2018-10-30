<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOpeningTimesTable extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('opening_times', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('restaurant_id');
            $table->enum('day', ['monday', 'tuesday', 'wednesday', 'thursday', 'friday', 'saturday', 'sunday']);
            $table->boolean('closed');
            $table->time('open');
            $table->time('close');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down()
    {
        Schema::dropIfExists('opening_times');
    }
}
