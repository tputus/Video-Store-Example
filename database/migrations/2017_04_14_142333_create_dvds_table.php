<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDvdsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('dvds', function (Blueprint $table) {
            Schema::enableForeignKeyConstraints();
            $table->engine = 'InnoDB';

            $table->increments('dvd_id');
            $table->string('name', 100);
            $table->string('rating', 10);
            $table->decimal('price', 5, 2);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('dvds');
    }
}
