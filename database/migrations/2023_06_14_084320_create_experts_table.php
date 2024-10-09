<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateExpertsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('experts', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id')->comment('Who creates a user');
            $table->string('name')->nullable();
            $table->string('occupation')->nullable();
            $table->string('affiliation')->nullable();
            $table->text('expertise')->nullable();
            $table->enum('gender', ['male', 'female', 'other'])->nullable();
            $table->string('profile')->nullable();
            $table->string('email')->unique()->nullable();
            $table->string('password');
            $table->tinyInteger('status')->default(1)->comment('0=>Inactive, 1=>Active');
            $table->string('email_verification_token')->nullable();
            $table->dateTime('email_verification_at')->nullable();
            $table->tinyInteger('is_email_verified')->default(0)->comment('0=>no, 1=>yes');
            $table->string('phone_number')->nullable();
            $table->string('ip_address')->nullable();
            $table->tinyInteger('remember_me')->default(0)->comment('0=>no, 1=>yes');
            $table->string('login_with')->nullable();
            $table->tinyInteger('user_locked')->default(0)->comment('0=>no, 1=>yes');
            $table->dateTime('user_locked_at')->nullable();
            $table->tinyInteger('wrong_attampt')->default(0);
            $table->dateTime('last_login_at')->nullable();
            $table->rememberToken();
            $table->softDeletes();
            $table->unsignedBigInteger('created_by')->nullable();
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
        Schema::dropIfExists('experts');
    }
}
