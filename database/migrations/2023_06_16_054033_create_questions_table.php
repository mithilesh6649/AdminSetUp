<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateQuestionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('questions', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('questionnaire_id')->comment('foreign key is pointing to questionnaire.id');
            $table->text('question');
            $table->tinyInteger('question_type')->default(1)->comment('1=option, 2=text');
            $table->bigInteger('question_section_id')->nullable()->comment('foreign key is pointing to question_sections.id');
            $table->tinyInteger('status')->default(1)->comment('0=>Inactive, 1=>Active');
            $table->unsignedBigInteger('created_by');
            $table->softDeletes();
            $table->timestamps();
            $table->foreign('questionnaire_id')->references('id')->on('questionnaires')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('questions');
    }
}
