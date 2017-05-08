<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCustomersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('customers', function (Blueprint $table) {
            Schema::enableForeignKeyConstraints();
            $table->engine = 'InnoDB';

            $table->increments('customer_id');
            $table->string('name', 100);
            $table->date('date_of_birth');
            $table->string('address', 255);
            $table->string('phone', 20);
            $table->string('email', 100);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('customers');
    }
}
