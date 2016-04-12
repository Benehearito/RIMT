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
            $table->unsignedInteger('setting_id');
            $table->unsignedInteger('stock');
            $table->decimal('dimension', 2, 2);
            $table->boolean('active');
            $table->softDeletes();
            $table->timestamps();
        });

        Schema::create('product_prices', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('product_id');
            $table->decimal('price', 10, 2);
            $table->boolean('active');
            $table->softDeletes();
            $table->timestamps();
        });

        Schema::create('product_i18ns', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('product_id');
            $table->unsignedInteger('language_id');
            $table->string('field');     //
            $table->string('name');      // El contenido
            $table->softDeletes();
            $table->timestamps();
        });

        Schema::create('product_i18n_strings', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('product_i18n_id');//
            $table->string('content');
            $table->softDeletes();
            $table->timestamps();
        });

        Schema::create('product_i18n_texts', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('product_i18n_id');
            $table->text('content');
            $table->softDeletes();
            $table->timestamps();
        });

        Schema::table('products', function (Blueprint $table) {
            $table->foreign('setting_id')->references('id')->on('settings');
        });
        
        Schema::table('product_prices', function (Blueprint $table) {
            $table->foreign('product_id')->references('id')->on('products')->onDelete('cascade');
        });
        
        Schema::table('product_i18ns', function (Blueprint $table) {
            $table->foreign('product_id')->references('id')->on('products')->onDelete('cascade');
            $table->foreign('language_id')->references('id')->on('languages')->onDelete('cascade');
        });

        Schema::table('product_i18n_texts', function (Blueprint $table) {
            $table->foreign('product_i18n_id')->references('id')->on('product_i18ns')->onDelete('cascade');
        });

        Schema::table('product_i18n_strings', function (Blueprint $table) {
            $table->foreign('product_i18n_id')->references('id')->on('product_i18ns')->onDelete('cascade');
        });
        
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('product_prices');
        Schema::drop('product_i18n_texts');
        Schema::drop('product_i18n_strings');
        Schema::drop('product_i18ns');
        Schema::drop('products');

    }
}
