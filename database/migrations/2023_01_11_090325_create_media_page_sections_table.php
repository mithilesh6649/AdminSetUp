<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMediaPageSectionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('media_page_sections', function (Blueprint $table) {
            $table->id();
            $table->string('section_name')->nullable();
            $table->string('section_slug')->nullable();
            $table->string('page_slug')->nullable();
            $table->string('light_image')->nullable();
            $table->string('dark_image')->nullable();
            $table->string('image_height')->nullable();
            $table->string('image_width')->nullable();
            $table->boolean('status')->default(1);
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
        Schema::dropIfExists('media_page_sections');
    }
}
