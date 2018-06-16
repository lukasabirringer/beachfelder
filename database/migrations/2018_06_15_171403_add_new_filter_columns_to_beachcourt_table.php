<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddNewFilterColumnsToBeachcourtTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
			Schema::table('beachcourts', function($table) {
	    	$table->integer('isSingleAccess')->after('isPublic');
	    	$table->integer('isswimmingLake')->after('isSingleAccess');
	    	$table->integer('isMembership')->after('isswimmingLake');
	    });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
    	Schema::table('beachcourts', function($table) {
	    	$table->dropColumn('paid');
	    	$table->dropColumn('isSingleAccess');
	    	$table->dropColumn('isswimmingLake');
	    	$table->dropColumn('isMembership');
	    });
    }
}
