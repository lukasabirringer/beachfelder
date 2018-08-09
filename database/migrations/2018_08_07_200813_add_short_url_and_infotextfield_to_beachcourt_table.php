<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddShortUrlAndInfotextfieldToBeachcourtTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('beachcourts', function (Blueprint $table) {
            $table->string('shortUrl')->nullable()->after('operatorContactPersonEmail');
            $table->string('internalNote')->nullable()->after('shortUrl');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('beachcourts', function (Blueprint $table) {
            $table->dropColumn('shortUrl');
            $table->dropColumn('internalNote');
        });
    }
}
