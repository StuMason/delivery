<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLocationsTable extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('locations', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->integer('locationable_id')->nullable();
            $table->string('locationable_type')->nullable();
            $table->string('line_1');
            $table->string('line_2');
            $table->string('line_3');
            $table->string('post_code');
            $table->string('lat_long');
            $table->json('meta');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down()
    {
        Schema::dropIfExists('locations');
    }
}
