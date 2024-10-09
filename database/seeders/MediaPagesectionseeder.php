<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class MediaPagesectionseeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        \DB::table('media_page_sections')->truncate();
        \DB::table('media_page_sections')->insert([
            [
                'section_name' => "We’ll diagnose image",
                'section_slug' =>'diagnose_section',
                'page_slug' => "home_website",
                'light_image' =>'hero-graphic.png',
                'dark_image' =>null,
                'image_height' => "883",
                'image_width' => "799",
                'status' =>1,
                
            ],
            [
                'section_name' => "Repair Services first image",
                'section_slug' => 'repair_first_section',
                'page_slug' => "home_website",
                'light_image' => 'image_one.png',
                'dark_image' =>null,
                'image_height' => "593",
                'image_width' => "633",
                'status' =>1,
                
            ],
            [
                'section_name' => "Repair Services second image",
                'section_slug' => 'repair_second_section',
                'page_slug' => "home_website",
                'light_image' => 'image_two.png',
                'dark_image' =>null,
                'image_height' => "593",
                'image_width' => "514",
                'status' =>1,
                
            ],
            [
                'section_name' => "mobile application image",
                'section_slug' => 'mobile_app_image',
                'page_slug' => "home_website",
                'light_image' => 'mobile_app.png',
                'dark_image' =>null,
                'image_height' => "831",
                'image_width' => "752",
                'status' =>1,
                
            ],
            [
                'section_name' => "mobile application QR",
                'section_slug' => 'mobile_app_qrimage',
                'page_slug' => "home_website",
                'light_image' => 'qr.png',
                'dark_image' =>null,
                'image_height' => "128",
                'image_width' => "128",
                'status' =>1,
                
            ],
 
            [
                'section_name' => "mobile intro image one",
                'section_slug' => 'mobile_intro_image_one',
                'page_slug' => "home_intro_mobile",
                'light_image' => 'light_image_1.svg',
                'dark_image' => 'dark_image_1.svg',
                'image_height' => "438",
                'image_width' => "430",
                'status' =>1,
                
            ],

            [
                'section_name' => "mobile intro image two",
                'section_slug' => 'mobile_intro_image_two',
                'page_slug' => "home_intro_mobile",
                'light_image' => 'light_image_1.svg',
                'dark_image' => 'dark_image_1.svg',
                'image_height' => "438",
                'image_width' => "430",
                'status' =>1,
                
            ],
            [
                'section_name' => "mobile intro image three",
                'section_slug' => 'mobile_intro_image_three',
                'page_slug' => "home_intro_mobile",
                'light_image' => 'light_image_2.svg',
                'dark_image' => 'dark_image_2.svg',
                'image_height' => "406",
                'image_width' => "430",
                'status' =>1,
                
            ],

            [
                'section_name' => "mobile intro image four",
                'section_slug' => 'mobile_intro_image_four',
                'page_slug' => "home_intro_mobile",
                'light_image' => 'light_image_2.svg',
                'dark_image' => 'dark_image_2.svg',
                'image_height' => "406",
                'image_width' => "430",
                'status' =>1,
                
            ],
        ]);
    }
}
