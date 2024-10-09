<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateQuestionExpertResponsesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('question_expert_responses', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('expert_id')->comment("pointing to experts.id");
            $table->unsignedBigInteger('question_id')->comment('foreign key is pointing to questions.id');
            //$table->bigInteger('question_option_id')->nullable()->comment('foreign key is pointing to question_options.id'); //TODO::may be deleted
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
        Schema::dropIfExists('question_expert_responses');
    }
}
