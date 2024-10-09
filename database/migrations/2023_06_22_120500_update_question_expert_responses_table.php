<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UpdateQuestionExpertResponsesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        try {
            Schema::table('question_expert_responses', function (Blueprint $table) {
                $table->bigInteger('region_id')->after('created_by')->nullable()->comment('foreign key is pointing to regions.id');
                $table->tinyInteger('answer')->after('region_id')->default(1)->nullable()->comment('1=>Most unlikely, 2=>Most likely');
                $table->longText('text_answer')->after('answer')->nullable()->comment('Answer of question type text');
                $table->integer('edit_count')->default(0)->comment("Total edit count of question's answer response");
            });
        } catch (\Throwable $th) {
            //throw $th;
        }
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
