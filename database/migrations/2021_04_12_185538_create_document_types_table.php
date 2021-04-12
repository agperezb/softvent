<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDocumentTypesTable extends Migration
{
    public function up()
    {
        Schema::create('document_types', function (Blueprint $table) {
            $table->bigIncrements('document_type_id');
            $table->string('document_type_name', 5)->unique();
            $table->timestamps();
        });
    }


    public function down()
    {
        Schema::dropIfExists('document_types');
    }
}
