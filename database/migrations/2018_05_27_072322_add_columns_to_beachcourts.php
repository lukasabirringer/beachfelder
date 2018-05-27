<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddColumnsToBeachcourts extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('beachcourts', function (Blueprint $table) {
            $table->string('district')->nullable()->after('city');
            $table->string('operatorContactPerson')->nullable()->after('operatorUrl');
            $table->string('operatorContactPersonEmail')->nullable()->after('operatorContactPerson');
            $table->string('operatorContactPersonPhone')->nullable()->after('operatorContactPersonEmail');
            $table->integer('floodlight')->nullable()->after('isPublic');
            $table->integer('shower')->nullable()->after('floodlight');
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
