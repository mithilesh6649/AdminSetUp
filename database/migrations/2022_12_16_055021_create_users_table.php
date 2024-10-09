<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->tinyInteger('user_type')->comment('Coordinator=>1, Expert=>2');
            $table->string('name_and_affiliation')->nullable();
            $table->string('email')->unique()->nullable();
            $table->string('password');
            $table->string('country')->nullable();
            $table->string('gps_coordination')->nullable();
            $table->string('lat')->nullable();
            $table->string('long')->nullable();
            $table->tinyInteger('assessment_in_two_months')->default(0)->comment('0=>no, 1=>yes');
            $table->tinyInteger('finalize_country_questionnaire')->default(0)->comment('0=>no, 1=>yes');
            $table->tinyInteger('terms_conditions')->comment('0=>rejected  1=>accepted')->nullable();
            $table->tinyInteger('status')->default(1)->comment('0=>Inactive, 1=>Active');
            $table->string('email_verification_token')->nullable();
            $table->dateTime('email_verification_at')->nullable();
            $table->tinyInteger('is_email_verified')->default(0)->comment('0=>no, 1=>yes');
            $table->string('phone_number')->nullable();
            $table->tinyInteger('push_notification')->default(1)->comment('enabled=>1, disabled=>0');
            $table->tinyInteger('email_notification')->default(1)->comment('enabled=>1, disabled=>0');
            $table->tinyInteger('app_notification')->default(1)->comment('enabled=>1, disabled=>0');
            $table->string('ip_address')->nullable();
            $table->string('device_name')->comment('Android, Apple, Laptop')->nullable();
            $table->tinyInteger('remember_me')->default(0)->comment('0=>no, 1=>yes');
            $table->string('login_with')->nullable();
            $table->tinyInteger('user_locked')->default(0)->comment('0=>no, 1=>yes');
            $table->dateTime('user_locked_at')->nullable();
            $table->tinyInteger('wrong_attampt')->default(0);
            $table->dateTime('last_login_at')->nullable();
            $table->rememberToken();
            $table->softDeletes();
            $table->bigInteger('created_by')->nullable();
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
        Schema::dropIfExists('users');
    }
}
