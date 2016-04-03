<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

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
            $table->increments('id');
            $table->unsignedInteger('category_id')->nullable();
            $table->string('title_es');
            $table->text('text_es');
            $table->decimal('price', 10, 2);
            $table->decimal('discount', 2, 2);
            $table->unsignedInteger('stock');
            $table->decimal('dimension', 2, 2);
            $table->unsignedInteger('order');
            $table->boolean('active');
            $table->timestamps();
           // $table->foreign('category_id')->references('categories')->on('id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('products');
    }
}
