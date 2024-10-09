<?php

namespace Database\Seeders;

use App\Models\Admin;
use App\Models\Question;
use App\Models\Questionnaire;
use App\Models\QuestionOption;
use Illuminate\Database\Seeder;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;

class QuestionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $super_admin_id = Admin::where('email', 'superadmin@lossdamage.com')->pluck('id')->first();

        DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        DB::table('questionnaires')->truncate();
        DB::table('questions')->truncate();
        DB::table('question_options')->truncate();
        DB::table('question_expert_panels')->truncate();
        DB::statement('SET FOREIGN_KEY_CHECKS=1;');


        //Create Questionnaires 
        $questionnaire =  [
            'title' => "TEST CLIMATE",
            'status' => 1,
            'created_by' => $super_admin_id,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ];
        $Questionnaire = Questionnaire::create($questionnaire);


        //Create Questions
        $question =  [
            'questionnaire_id' => $Questionnaire->id,
            'question' => 'Question: Lorem Ipsum is simply dummy text of the printing and typesetting industry',
            'status' => 1,
            'created_by' => $super_admin_id,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ];
        $Question = Question::create($question);

        //Create Questions Options
        $question_options =  [
            [
                'question_id' => $Question->id,
                'option' => 'This is a first Option',
                'is_correct' => 1,
                'created_by' => $super_admin_id,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'question_id' => $Question->id,
                'option' => 'This is a second Option',
                'is_correct' => 0,
                'created_by' => $super_admin_id,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'question_id' => $Question->id,
                'option' => 'This is a third Option',
                'is_correct' => 0,
                'created_by' => $super_admin_id,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
        ];

        foreach ($question_options as $key => $value) {
            $Question = QuestionOption::create($value);
        }
    }
}
