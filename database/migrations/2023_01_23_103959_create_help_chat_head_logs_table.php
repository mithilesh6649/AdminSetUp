<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateHelpChatHeadLogsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('help_chat_head_logs', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('help_and_support_id');
            $table->text('description')->nullable();
            $table->string('attachment')->nullable();
            $table->string('user_type')->nullable()->comment('Coordinator=>1, Expert=>2, Admin=>3');
            $table->integer('status')->default(1)->comment('1=>Opened , 2=>Resolved');
            $table->bigInteger('response_by')->nullable()->comment('Coordinator=>1, Expert=>2, Admin=>3');
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
        Schema::dropIfExists('help_chat_head_logs');
    }
}
