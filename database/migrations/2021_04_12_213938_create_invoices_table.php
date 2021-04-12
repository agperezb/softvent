<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInvoicesTable extends Migration
{
    public function up()
    {
        Schema::create('invoices', function (Blueprint $table) {
            $table->bigIncrements('invoice_id');
            $table->foreignId('user_id')->references('id')->on('users');
            $table->foreignId('client_id')->references('client_id')->on('clients');
            $table->double('invoice_value');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('invoices');
    }
}
