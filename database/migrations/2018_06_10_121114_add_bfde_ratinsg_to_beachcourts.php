<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddBfdeRatinsgToBeachcourts extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('beachcourts', function (Blueprint $table) {
            $table->integer('bfdeRatingSand')->nullable()->after('rating');
            $table->integer('bfdeRatingNet')->nullable()->after('rating');
            $table->integer('bfdeRatingCourt')->nullable()->after('rating');
            $table->integer('bfdeRatingEnvironment')->nullable()->after('rating');
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
