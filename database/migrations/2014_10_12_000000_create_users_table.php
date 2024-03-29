<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{

    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('user_profile', '20');
            $table->boolean('user_status');
            $table->string('email', '100')->unique();
            $table->foreignId('commerce_id')->references('commerce_id')->on('commerces');
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password', '100');
            $table->rememberToken();
            $table->timestamps();
        });

    }

    public function down()
    {
        Schema::dropIfExists('users');
    }
}
