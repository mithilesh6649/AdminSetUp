<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUserRegionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user_regions', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id')->comment("pointing to users.id");
            $table->unsignedBigInteger('region_id')->comment("pointing to regions.id");
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
        Schema::dropIfExists('user_regions');
    }
}
