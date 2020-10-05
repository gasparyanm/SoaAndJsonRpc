<?php

use Illuminate\Database\Seeder;
use App\Page;

class PageSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        DB::table('pages')->insert([
            'page_uid' => 8,
            'title' => 'Laravel Database Configuration',
            'content' => 'The database configuration for your application is located at config/database.php. In this file you may define all of your database connections, as well as specify which connection should be used by default. Examples for most of the supported database systems are provided in this file.',
            'created_at' => now()
        ]);

        DB::table('pages')->insert([
            'page_uid' => 5,
            'title' => 'Laravel Blade Templates',
            'content' => 'Blade is the simple, yet powerful templating engine provided with Laravel. Unlike other popular PHP templating engines, Blade does not restrict you from using plain PHP code in your views. In fact, all Blade views are compiled into plain PHP code and cached until they are modified, meaning Blade adds essentially zero overhead to your application. Blade view files use the .blade.php file extension and are typically stored in the resources/views directory.',
            'created_at' => now()
        ]);

        DB::table('pages')->insert([
            'page_uid' => 2,
            'title' => 'SOS: Armenia Stands for Peace ',
            'content' => 'On 27th September 2020, the morning wasn’t good. Early in the morning, Azerbaijan unleashed a military offensive along with the border of Artsakh targeting also civilian settlements including the capital Stepanakert. As a result of the shelling, a woman and a child were killed.',
            'created_at' => now()
        ]);
    }
}
