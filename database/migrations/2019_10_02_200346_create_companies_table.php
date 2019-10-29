<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCompaniesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('companies', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id')->unsigned()->nullable();
            $table->string('name');
            $table->timestamp('email_verified_at')->nullable();
            $table->string('field_sector')->default('');
            $table->string('CEO_firstname')->nullable();
            $table->string('CEO_lastname')->nullable();
            $table->string('manager_firstname')->default('');
            $table->string('manager_lastname')->default('');
            $table->string('mobile_number')->nullable();
            $table->string('telephone')->default('');
            $table->string('city')->default('');
            $table->string('zip_code')->default('');
            $table->string('street_and_number')->default('');
            $table->string('website')->default('')->nullable();
            $table->string('linkedIn')->nullable();
            $table->string('profile_picture')->nullable();
            $table->string('background_picture')->nullable();
            $table->string('bio', 255)->nullable();
            //$table->integer('user_id')->unsigned();
            //$table->foreign('user_id')->references('id')->on('companies');
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
        Schema::dropIfExists('companies');
    }
}
