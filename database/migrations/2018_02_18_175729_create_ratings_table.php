<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRatingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ratings', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('beachcourt_id')->unsigned();
            $table->integer('sandQuality');
            $table->integer('courtTopography');
            $table->integer('sandDepth');
            $table->integer('irrigationSystem');
            $table->integer('netHeight');
            $table->integer('netType');
            $table->integer('netAntennas');
            $table->integer('netTension');
            $table->integer('boundaryLines');
            $table->integer('fieldDimensions');
            $table->integer('securityZone');
            $table->integer('windProtection');
            $table->integer('interferenceCourt');
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
        Schema::dropIfExists('ratings');
    }
}
