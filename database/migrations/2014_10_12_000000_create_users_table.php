<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->increments('id')->unique();
            $table->string('userName')->unique();
            $table->string('firstName');
            $table->string('lastName');
            $table->string('email')->unique();
            $table->string('password');
            $table->string('pictureName')->default('placeholder-user.png');
            $table->integer('postalCode')->nullable();
            $table->string('city')->nullable();
            $table->string('birthdate')->nullable();
            $table->string('role')->default('registered');
            $table->boolean('isConfirmed')->default(0);
            $table->string('confirmationToken')->nullable();
            $table->string('sex')->nullable();
            $table->boolean('publicProfile')->default(1);
            $table->rememberToken();
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
        Schema::dropIfExists('users');
    }
}
