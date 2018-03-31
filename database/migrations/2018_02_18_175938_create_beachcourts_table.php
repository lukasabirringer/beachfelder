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
            $table->string('postalCode')->nullable()->default('keine Angabe');
            $table->string('city')->nullable()->default('keine Angabe');
            $table->string('street')->nullable()->default('keine Angabe');
            $table->string('houseNumber')->nullable()->default('keine Angabe');
            $table->string('country')->nullable()->default('keine Angabe');
            $table->string('state')->nullable()->default('keine Angabe');
            $table->text('latitude')->nullable();
            $table->text('longitude')->nullable();
            $table->boolean('isChargeable')->nullable()->default('keine Angabe');
            $table->text('notes')->nullable()->default('keine Angabe');
            $table->integer('courtCountOutdoor')->nullable()->default('keine Angabe');
            $table->integer('courtCountIndoor')->nullable()->default('keine Angabe');
            $table->boolean('isPublic')->nullable()->default('keine Angabe');
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
