<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRestaurantsTable extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('restaurants', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('description');
            $table->float('minimum_order');
            $table->string('contact_number');
            $table->boolean('open');
            $table->enum('status', ['pending', 'verified', 'contact']);
            $table->timestamps();
        });

        Schema::create('restaurant_user', function (Blueprint $table) {
            $table->integer('restaurant_id')->unsigned();
            $table->integer('user_id')->unsigned();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down()
    {
        Schema::dropIfExists('restaurants');
    }
}
