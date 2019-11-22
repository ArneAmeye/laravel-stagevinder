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
        $internship2->background_picture = 'default.jpg';
        $internship2->is_available = '1';
        $internship2->save();

        factory(\App\Internship::class, 5)->create();
    }
}
