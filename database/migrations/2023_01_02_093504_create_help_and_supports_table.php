<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateHelpAndSupportsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('help_and_supports', function (Blueprint $table) {
            $table->id();
            $table->string('subject')->nullable();
            $table->longText('description')->nullable();
            $table->bigInteger('user_id')->nullable();
            $table->tinyInteger('user_type')->nullable()->default(1)->comment('Coordinator=>1, Expert=>2');
            $table->tinyInteger('status')->default(1)->comment('1=>Opened , 2=>Resolved');
            $table->timestamps();
        });
    }
    /**
     * Reverse the migrations.
     *s
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('help_and_supports');
    }
}
