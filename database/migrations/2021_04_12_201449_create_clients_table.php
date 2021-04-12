<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateClientsTable extends Migration
{
    public function up()
    {
        Schema::create('clients', function (Blueprint $table) {
            $table->bigIncrements('client_id');
            $table->foreignId('document_type_id')->references('document_type_id')->on('document_types');
            $table->string('client_name', 50);
            $table->string('client_document', 12)->unique();
            $table->string('client_phone', 15);
            $table->integer('client_points');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('clients');
    }
}
