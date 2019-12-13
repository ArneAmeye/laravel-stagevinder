<?php

use Illuminate\Database\Seeder;

class TagsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $tag1 = new \App\Tag();
        $tag1->name = "development";
        $tag1->save();

        $tag2 = new \App\Tag();
        $tag2->name = "design";
        $tag2->save();

        $tag3 = new \App\Tag();
        $tag3->name = "php";
        $tag3->save();

        $tag5 = new \App\Tag();
        $tag5->name = "javascript";
        $tag5->save();

        $tag6 = new \App\Tag();
        $tag6->name = "webdevelopment";
        $tag6->save();

        $tag7 = new \App\Tag();
        $tag7->name = "java";
        $tag7->save();

        $tag8 = new \App\Tag();
        $tag8->name = "animation";
        $tag8->save();
    }
}
