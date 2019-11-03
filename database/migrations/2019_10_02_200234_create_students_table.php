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
            $table->increments('id');
            $table->integer('user_id')->unsigned()->nullable();
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
            $table->timestamp('email_verified_at')->nullable();
            $table->string('field_study')->nullable();
            $table->string('school')->nullable();
            $table->string('bio')->nullable();
            $table->string('behance')->nullable();
            $table->string('behance_api_result')->nullable();
            //$table->foreign('user_id')->references('id')->on('users')->onDelete('cascade')->onUpdate('cascade');
            $table->rememberToken();
            $table->timestamps();

            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
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
