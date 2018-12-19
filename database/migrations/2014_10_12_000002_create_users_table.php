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
            $table->increments('id');
            $table->string('username')->unique();
            $table->string('password');
            $table->string('name')->nullable();
            $table->string('father_city')->nullable();
            $table->string('mother_city')->nullable();
            $table->string('caste_id')->nullable();
            $table->string('sub_caste_id')->nullable();
            $table->string('mobile', 10)->nullable();
            $table->string('gender')->default('Male');
            $table->string('dob', 10)->nullable();
            $table->string('marital_status')->default('Single');
            $table->string('education')->nullable();
            $table->string('occupation')->nullable();
            $table->string('address')->nullable();
            $table->string('avatar')->nullable();
            $table->boolean('caste_updated')->default(false);
            $table->boolean('profile_updated')->default(false);
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
