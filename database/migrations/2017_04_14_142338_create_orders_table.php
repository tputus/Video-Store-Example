<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {

          $table->engine = 'InnoDB';

          $table->increments('order_id');

          $table->integer('customer_id')->unsigned();

          $table->integer('dvd_id')->unsigned();

          $table->date('start_date');
          $table->date('due_date');
          $table->boolean('returned');
        });

        Schema::table('orders', function($table) {
          $table->foreign('customer_id')->references('customer_id')->on('customers');
          $table->foreign('dvd_id')->references('dvd_id')->on('dvds');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('orders');
    }
}
