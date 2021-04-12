<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductsTable extends Migration
{
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->bigIncrements('product_id');
            $table->foreignId('provider_id')->references('provider_id')->on('providers');
            $table->foreignId('category_id')->references('category_id')->on('categories');
            $table->foreignId('commerce_id')->references('commerce_id')->on('commerces');
            $table->string('product_name', 50);
            $table->string('product_stock', 50);
            $table->double('product_value');
            $table->string('product_description', 200);
            $table->boolean('product_status');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('products');
    }
}
