<?php

use Illuminate\Database\Seeder;

class InternshipsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        $internship1 = new \App\Internship();
        $internship1->id = '1';
        $internship1->title = 'UX/UI designer';
        $internship1->company_id = '2';
        $internship1->description = 'Ben je op zoek naar een uitdagende stage waar je klant en merk in naadloze ervaring kan samenbrengen? Je weet dat een doordachte UX de BX kan versterken? Dan is Intracto het ideale stagebedrijf voor jou.';
        /*$internship1->requirements = 'Adobe Illustrator, Adobe Experience Design, Adobe Photoshop';*/
        $internship1->field_sector = 'Design';
        $internship1->background_picture = 'default.jpg';
        $internship1->is_available = '1';
        $internship1->save();

        $internship2 = new \App\Internship();
        $internship2->id = '2';
        $internship2->title = 'Drupal developer';
        $internship2->company_id = '2';
        $internship2->description = 'Gebeten door het Drupal-virus? Wil je je Drupal-kennis nog verder uitbouwen? Goed nieuws: we zijn voor onze campus in Herentals namelijk op zoek naar een nieuwe Drupal backend-developer…';
        /*$internship2->requirements = 'PHP, twig';*/
        $internship2->field_sector = 'Drupal development';
        $internship2->background_picture = 'drupal.jpg';
        $internship2->is_available = '1';
        $internship2->save();

        $internship3 = new \App\Internship();
        $internship3->id = '3';
        $internship3->title = 'Front-End Development';
        $internship3->company_id = '3';
        $internship3->description = 'A well-designed CSS3 transition makes you feel complete? You resize your screen to check media queries of newly launched websites? Relative CSS units are your way to go? Then you are the MINSKY-frontend developer we are looking for!';
        /*$internship3->requirements = 'PHP, twig';*/
        $internship3->field_sector = 'Front-End';
        $internship3->background_picture = 'default.jpg';
        $internship3->is_available = '1';
        $internship3->save();

        $internship4 = new \App\Internship();
        $internship4->id = '4';
        $internship4->title = 'Front-End & Back-End Development';
        $internship4->company_id = '6';
        $internship4->description = 'Like what you see and triggered to talk about some of your or our ideas?';
        /*$internship4->requirements = 'PHP, twig';*/
        $internship4->field_sector = 'Front-End & Back-End';
        $internship4->background_picture = 'fullstack.jpg';
        $internship4->is_available = '1';
        $internship4->save();

        $internship5 = new \App\Internship();
        $internship5->id = '5';
        $internship5->title = 'Docker';
        $internship5->company_id = '5';
        $internship5->description = 'Like what you see and triggered to talk about some of your or our ideas?';
        /*$internship5->requirements = 'PHP, twig';*/
        $internship5->field_sector = 'Server';
        $internship5->background_picture = 'docker.jpg';
        $internship5->is_available = '1';
        $internship5->save();

        $internship6 = new \App\Internship();
        $internship6->id = '6';
        $internship6->title = 'Laravel';
        $internship6->company_id = '7';
        $internship6->description = 'Working on the most awesome application ever? Work on a laravel project made with the best workers on the planet! 🌍';
        /*$internship6->requirements = 'PHP, twig';*/
        $internship6->field_sector = 'Web development';
        $internship6->background_picture = 'default.jpg';
        $internship6->is_available = '1';
        $internship6->save();

        //factory(\App\Internship::class, 5)->create();
    }
}
