<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddStatusToStudentsInternshipsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('students_internships', function (Blueprint $table) {
            // add status to students_internships table
            $table->integer('status')->default(0)->after('id');
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
            //make sure this column can be dropped if table drops
            $table->dropColumn('status');
        });
    }
}
