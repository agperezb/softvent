<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePersonsTable extends Migration
{
    public function up()
    {
        Schema::create('persons', function (Blueprint $table) {
            $table->bigIncrements('person_id');
            $table->foreignId('user_id')->references('id')->on('users');
            $table->foreignId('document_type_id')->references('document_type_id')->on('document_types');
            $table->string('person_name', 50);
            $table->string('person_last_name', 50);
            $table->string('person_document', 12)->unique();
            $table->string('person_phone', 15);
            $table->date('person_birthdate');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('persons');
    }
}
