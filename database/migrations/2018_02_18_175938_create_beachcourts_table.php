<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBeachcourtsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('beachcourts', function (Blueprint $table) {
            $table->increments('id');
            $table->string('postalCode')->nullable();
            $table->string('city')->nullable();
            $table->string('street')->nullable();
            $table->string('houseNumber')->nullable();
            $table->string('country')->nullable();
            $table->string('state')->nullable();
            $table->text('latitude')->nullable();
            $table->text('longitude')->nullable();
            $table->boolean('isChargeable')->nullable();
            $table->text('notes')->nullable();
            $table->integer('courtCountOutdoor')->default('-');
            $table->integer('courtCountIndoor')->default('-');
            $table->boolean('isPublic')->nullable();
            $table->double('rating')->nullable();
            $table->integer('ratingCount')->nullable();
            $table->string('ratingDate')->nullable();
            $table->double('ratingSand')->nullable();
            $table->double('ratingNet')->nullable();
            $table->double('ratingCourt')->nullable();
            $table->double('ratingEnvironment')->nullable();
            $table->string('submitState')->nullable();
            $table->string('operator')->nullable();
            $table->string('operatorUrl')->nullable();
            $table->integer('user_id')->unsigned();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('beachcourts');
    }
}
