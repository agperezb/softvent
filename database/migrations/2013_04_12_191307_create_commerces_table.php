<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCommercesTable extends Migration
{
    public function up()
    {
        Schema::create('commerces', function (Blueprint $table) {
            $table->bigIncrements('commerce_id');
            $table->string('commerce_name', 50)->unique();
            $table->string('commerce_description', 50);
            $table->boolean('commerce_status');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('commerces');
    }
}
