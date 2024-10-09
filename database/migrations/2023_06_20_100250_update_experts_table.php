<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UpdateExpertsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('experts', function (Blueprint $table) {
            $table->tinyInteger('push_notification')->default(1)->after("phone_number")->comment('enabled=>1, disabled=>0');
            $table->tinyInteger('email_notification')->default(1)->after("push_notification")->comment('enabled=>1, disabled=>0');
            $table->tinyInteger('app_notification')->default(1)->after("email_notification")->comment('enabled=>1, disabled=>0');
        });
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
