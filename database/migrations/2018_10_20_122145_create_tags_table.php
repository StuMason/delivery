<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTagsTable extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('tags', function (Blueprint $table) {
            $table->increments('id');
            $table->string('tag');
            $table->string('description');
            $table->timestamps();
        });

        Schema::create('dish_tag', function (Blueprint $table) {
            $table->integer('dish_id')->unsigned();
            $table->integer('tag_id')->unsigned();
        });

        Schema::create('restaurant_tag', function (Blueprint $table) {
            $table->integer('restaurant_id')->unsigned();
            $table->integer('tag_id')->unsigned();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down()
    {
        Schema::dropIfExists('tags');
        Schema::dropIfExists('dish_tag');
        Schema::dropIfExists('restaurant_tag');
    }
}
