<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateConfigurationsTable extends Migration
{

    public function up()
    {
        Schema::create('configurations', function (Blueprint $table) {
            $table->bigIncrements('configuration_id');
            $table->string('configuration_name', 255);
            $table->string('configuration_value', 255);
            $table->timestamps();
        });
    }


    public function down()
    {
        Schema::dropIfExists('configurations');
    }
}
