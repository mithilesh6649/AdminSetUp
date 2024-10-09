<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddQuestionnairesIdToQuestionExpertResponsesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('question_expert_responses', function (Blueprint $table) {
           $table->bigInteger('questionnaires_id')->after('question_id')->nullable()->comment('foreign key is pointing to questionnaires.id');
       });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('question_expert_responses', function (Blueprint $table) {
            //
        });
    }
}
