<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PageSectionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('page_sections')->truncate();
		DB::table('page_sections')->insert([
			[
				'title' => 'Privacy Policy',
				'slug' => "privacy_policy",
				'device_type' => 'web'
			],
			[ 
				'title' => 'Terms & Conditions',
				'slug' => 'terms_and_conditions',
				'device_type' => 'web'
			],
			[
				'title' => 'About Us',
				'slug' => 'about_us',
				'device_type' => 'web'
			],
			[
				'title' => 'Home',
				'slug' => 'home',
				'device_type' => 'web'
			],

			//Mobiles
            [
				'title' => 'Privacy Policy',
				'slug' => "privacy_policy",
				'device_type' => 'mobile'
			],
			[
				'title' => 'Terms & Conditions',
				'slug' => 'terms_and_conditions',
				'device_type' => 'mobile'
			],
			[
				'title' => 'About Us',
				'slug' => 'about_us',
				'device_type' => 'mobile'
			],
			[
				'title' => 'Mobile introduction screen',
				'slug' => 'intro_screen',
				'device_type' => 'mobile'
			],
			[
				'title' => 'Home',
				'slug' => 'home',
				'device_type' => 'mobile'
			],
			
		]);
    }
}
