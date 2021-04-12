<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProvidersTable extends Migration
{
    public function up()
    {
        Schema::create('providers', function (Blueprint $table) {
            $table->bigIncrements('provider_id');
            $table->string('provider_name', 100);
            $table->string('provider_nit', 20)->unique();
            $table->string('provider_direction', 100);
            $table->string('provider_phone', 15);
            $table->timestamps();
        });
    }


    public function down()
    {
        Schema::dropIfExists('providers');
    }
}
