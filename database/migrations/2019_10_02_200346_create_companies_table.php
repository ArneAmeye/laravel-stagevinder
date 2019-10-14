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
            $table->string('field_sector')->default('');
            $table->string('manager_firstname')->default('');
            $table->string('manager_lastname')->default('');
            $table->string('telephone')->default('');
            $table->string('city')->default('');
            $table->string('zip_code')->default('');
            $table->string('street_and_number')->default('');
            $table->string('website')->default('');
            //$table->integer('user_id')->unsigned();
            //$table->foreign('user_id')->references('id')->on('companies');
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
