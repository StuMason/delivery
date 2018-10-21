<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOrdersTable extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id')->unsigned();
            $table->integer('restaurant_id')->unsigned();
            $table->integer('location_id')->unsigned();
            $table->enum('type', ['delivery', 'collection']);
            $table->float('total')->nullable();
            $table->enum('status', ['queued', 'confirmed', 'cancelled', 'ready', 'complete']);
            $table->timestamps();
        });

        Schema::create('dish_order', function (Blueprint $table) {
            $table->integer('dish_id')->unsigned();
            $table->integer('order_id')->unsigned();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down()
    {
        Schema::dropIfExists('orders');
    }
}
