<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateQuestionExpertPanelsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('question_expert_panels', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('questionnaire_id')->comment('foreign key is pointing to questionnaire.id');
            $table->unsignedBigInteger('expert_panel_id')->comment('foreign key is pointing to expert_panel.id');
            $table->tinyInteger('status')->default(1)->comment('0=>Inactive, 1=>Active');
            $table->unsignedBigInteger('created_by')->comment('foreign key is pointing to (coordinator)users.id');
            $table->softDeletes();
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
        Schema::dropIfExists('question_expert_panels');
    }
}
