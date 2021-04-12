<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateQuestionsTable extends Migration
{
    public function up()
    {
        Schema::create('questions', function (Blueprint $table) {
            $table->bigIncrements('question_id');
            $table->foreignId('user_id')->references('id')->on('users');
            $table->string('question_description', 100);
            $table->string('question_response', 100);
            $table->timestamps();
        });
    }


    public function down()
    {
        Schema::dropIfExists('questions');
    }
}
