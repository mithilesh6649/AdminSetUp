<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateExpertPanelExpertsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('expert_panel_experts', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('expert_panel_id')->comment("pointing to expert_panels.id");
            $table->unsignedBigInteger('expert_id')->comment("pointing to experts.id");
            $table->tinyInteger('status')->default(1)->comment('0=>Inactive, 1=>Active');
            $table->unsignedBigInteger('created_by')->comment("pointing to users.id");
            $table->softDeletes();
            $table->timestamps();
            $table->foreign('expert_id')->references('id')->on('experts')->onDelete('cascade');
        });
    }
    
    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('expert_panel_experts');
    }
}
