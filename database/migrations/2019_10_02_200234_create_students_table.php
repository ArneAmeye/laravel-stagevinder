<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateStudentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('students', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('facebook_user_id')->nullable(); //fb login ID
            $table->string('firstname')->default('');
            $table->string('lastname')->default('');
            $table->string('birth_date')->default('');
            $table->string('profile_picture')->default('');
            $table->string('background_picture')->nullable();
            $table->string('adress')->nullable();
            $table->string('mobile_number')->nullable();
            $table->string('linkedIn')->nullable();
            $table->string('skype')->nullable();
            $table->string('website')->nullable();
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password')->default('');
            $table->string('field_study')->nullable();
            $table->string('school')->nullable();
            $table->string('bio')->nullable();
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
        Schema::dropIfExists('students');
    }
}
