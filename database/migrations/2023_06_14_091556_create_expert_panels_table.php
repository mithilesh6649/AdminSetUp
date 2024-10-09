<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateExpertPanelsTable extends Migration
{

    /**
     * Run the migrations.
     * In both tables we are inserting expert panel information and expert panel users.
     * So this is a one to many association. 
     * Against one panel there can be many users/ experts.
     * @return void
     */
    public function up()
    {
        Schema::create('expert_panels', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id')->comment("pointing to users.id");
            $table->string('panel_name');
            $table->tinyInteger('status')->default(1)->comment('0=>Inactive, 1=>Active');
            $table->enum('ep_status',['pending','ongoing','completed'])->default('pending')->comment('pending | ongoing | completed');
            $table->unsignedBigInteger('created_by')->nullable();
            $table->softDeletes();
            $table->timestamps();
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('expert_panels');
    }
}
