<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDetailInvoicesTable extends Migration
{
    public function up()
    {
        Schema::create('detail_invoices', function (Blueprint $table) {
            $table->bigIncrements('detail_invoice_id');
            $table->foreignId('product_id')->references('product_id')->on('products');
            $table->foreignId('invoice_id')->references('invoice_id')->on('invoices');
            $table->double('product_value');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('detail_invoices');
    }
}
