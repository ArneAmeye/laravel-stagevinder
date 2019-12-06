<?php

use Illuminate\Database\Seeder;

class ReviewInternshipsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        $internship1 = new \App\ReviewInternship();
        $internship1->student_id = 1;
        $internship1->internship_id = 1;
        $internship1->review_text = 'This internship was awesome!!!';
        $internship1->review_rating = 5;
        $internship1->save();

        $internship2 = new \App\ReviewInternship();
        $internship2->student_id = 2;
        $internship2->internship_id = 2;
        $internship2->review_text = 'This was a terrible working experience :(';
        $internship2->review_rating = 1;
        $internship2->save();
    }
}
