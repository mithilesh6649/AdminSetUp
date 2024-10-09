<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCoordinatorQuestionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('coordinator_questions', function (Blueprint $table) {
            $table->id();
            $table->integer('coordinator_id')->nullable();
            $table->integer('questionnaire_id')->nullable();
            $table->integer('question_id')->nullable();
            $table->text('question')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('coordinator_questions');
    }
}
