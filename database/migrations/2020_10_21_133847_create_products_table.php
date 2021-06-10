<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id('id');
            $table->string('name');
            $table->string('price');
            $table->string('sku');
            $table->text('description')->nullable();
            $table->string('slug')->unique();
            $table->string('size')->default('M');
            $table->string('feature_image_path')->nullable();
            $table->string('feature_image_name')->nullable();
            $table->foreignId('user_id')->constrained();
            $table->foreignId('category_id')->constrained();
            $table->tinyinteger('active')->default(1)->index();
            $table->tinyinteger('hot')->default(0);
            $table->integer('sale')->default(0);
            $table->integer('pay')->default(1);
            $table->integer('product_number')->default(1);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('products');
    }
}
