<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePlaces extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('places', function (Blueprint $table) {
            $table->integer('id')->autoIncrement();
            $table->string('name', 255);
            $table->boolean('visited');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('places');
    }
}
