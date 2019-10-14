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
            $table->bigIncrements('id');
            $table->string('name');
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->string('field_sector')->nullable();
            $table->string('CEO_firstname')->nullable();
            $table->string('CEO_lastname')->nullable();
            $table->string('manager_firstname')->nullable();
            $table->string('manager_lastname')->nullable();
            $table->string('mobile_number')->nullable();
            $table->string('city')->nullable();
            $table->string('zip_code')->nullable();
            $table->string('street_and_number')->nullable();
            $table->string('website')->nullable();
            $table->string('linkedIn')->nullable();
            $table->string('profile_picture')->nullable();
            $table->string('background_picture')->nullable();
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
        Schema::dropIfExists('companies');
    }
}
