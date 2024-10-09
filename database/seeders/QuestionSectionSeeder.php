<?php

namespace Database\Seeders;

use App\Models\QuestionSection;
use Illuminate\Database\Seeder;
use Illuminate\Support\Carbon;

class QuestionSectionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        QuestionSection::truncate();

        $sections = [
            [
                "name" => "The Biophysical Conditions",
                "slug" => "the_biophysical_conditions",
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                "name" => "Tradeoff Intensity (TI)",
                "slug" => "tradeoff_intensity",
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                "name" => "Institutional Response (IR)",
                "slug" => "institutional_response",
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
        ];

        foreach ($sections as $key => $value) {
            QuestionSection::create($value);
        }
    }
}
