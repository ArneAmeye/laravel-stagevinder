<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddCompanyIdToStudentsinternships extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('students_internships', function (Blueprint $table) {
            //adding company_id to the student_internships table
            $table->integer('company_id')->unsigned()->nullable()->after('student_id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('students_internships', function (Blueprint $table) {
            //make sure this column can also be dropped
            $table->dropColumn('company_id');
        });
    }
}
