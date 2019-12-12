<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStudentsCompaniesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('students_companies', function (Blueprint $table) {
            // create table students_companies
            $table->bigIncrements('id');
            $table->integer('student_id')->unsigned()->nullable();
            $table->integer('company_id')->unsigned()->nullable();
            $table->float('distance')->nullable();
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
        Schema::table('students_companies', function (Blueprint $table) {
            Schema::dropIfExists('students_companies');
        });
    }
}
