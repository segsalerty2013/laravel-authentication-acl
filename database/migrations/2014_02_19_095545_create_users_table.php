<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;


class CreateUsersTable extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::dropIfExists('users');
        Schema::create('users', function(Blueprint $table)
        {
            $table->increments('id');
            $table->string('email')->nullable(); //makes email optional
            $table->string('phone');
            $table->string('password');
            $table->text('permissions')->nullable();
            $table->boolean('activated')->default(false);//store if otp has been activated
            $table->boolean('banned')->default(0);
            $table->string('activation_code')->nullable();//stores the OTP
            $table->timestamp('activated_at')->nullable();
            $table->timestamp('last_login')->nullable();
            $table->string('persist_code')->nullable();
            $table->string('reset_password_code')->nullable();
            $table->boolean('protected')->default(0);
            $table->timestamps();
            $table->softDeletes(); //adds soft delete
            // setup index
            $table->unique('phone');
            $table->index('activation_code'); //the OTP
            $table->index('reset_password_code'); //reset password OTP for password reset
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {

    }

}
