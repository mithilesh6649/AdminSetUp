<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class IntroPageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \DB::table('intro_page_contents')->truncate();
        \DB::table('intro_page_contents')->insert([
            [
                'title' => "What is Lorem Ipsum?",
                'description' => "Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.",
                'light_image' => 'into_page_1.png',
                'dark_image' => 'into_page_2.png',
            ],
            [
                'title' => "Why do we use it?",
                'description' => "It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using 'Content here, content here', making it look like readable English.",
                'light_image' => 'into_page_3.png',
                'dark_image' => 'into_page_2.png',
            ],
            [
                'title' => "What is Lorem Ipsum?",
                'description' => "Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.",
                'light_image' => 'into_page_1.png',
                'dark_image' => 'into_page_3.png',
            ],
            [
                'title' => "Why do we use it?",
                'description' => "It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using 'Content here, content here', making it look like readable English.",
                'light_image' => 'into_page_1.png',
                'dark_image' => 'into_page_2.png',
            ],

        ]);
    }
}
