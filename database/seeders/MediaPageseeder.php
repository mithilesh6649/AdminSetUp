<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class MediaPageseeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \DB::table('media_pages')->truncate();
        \DB::table('media_pages')->insert([
            [
                'page_name' => "Home",
                'page_slug' => 'home_website',
                'media_type'=>'website'
            ],
            [ 'page_name' => "Mobile Introduction Screen",
                'page_slug' => 'home_intro_mobile',
                'media_type'=>'mobile'
            ]
        ]);
    }
}
