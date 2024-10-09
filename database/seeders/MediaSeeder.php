<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class MediaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \DB::table('media')->truncate();
        \DB::table('media')->insert([
            [
                'name' => "Website",
                'slug' => 'website',
                'status'=>1
            ],
            [
                'name' => "Mobile",
                'slug' => 'mobile',
                'status'=>1
            ],
        ]);
    } 
}
