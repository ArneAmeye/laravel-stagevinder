<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddPictureToInternships extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('internships', function (Blueprint $table) {
            //add profile picture to internships table
            $table->string('profile_picture')->default('default.png')->after('field_sector');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('internships', function (Blueprint $table) {
            //make sure this column can be dropped if table drops
            $table->dropColumn('profile_picture');
        });
    }
}
