<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAdminsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('admins', function (Blueprint $table) {
            $table->id();
            $table->string('first_name')->nullable();
            $table->string('last_name')->nullable();
            $table->string('email')->unique();
            $table->string('phone_number')->unique()->nullable();
            $table->string('password');
            $table->string('ip_address')->nullable();
            $table->tinyInteger('remember_me')->default(0)->comment('0=>no, 1=>yes');
            $table->integer('role_id');
            $table->tinyInteger('status')->default(1)->comment('0=>Inactive, 1=>Active');
            $table->string('email_verification_token')->nullable();
            $table->timestamp('email_verified_at')->nullable();
            $table->tinyInteger('is_email_verified')->default(0)->comment('0=>no,1=>yes');
            $table->tinyInteger('is_user_locked')->default(0)->comment('0=>no,1=>yes');
            $table->timestamp('user_locked_at')->nullable();
            $table->integer('wrong_attampt')->nullable();
            $table->bigInteger('created_by')->nullable();
            $table->rememberToken();
            $table->softDeletes();
            $table->timestamp('created_at')->useCurrent();
            $table->timestamp('updated_at')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('admins');
    }
}
