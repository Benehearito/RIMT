<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id')->unsigned();

            $table->enum('status', ['carrito','pendientebanco','pago','cancelado', 'enviado' ,'devuelto', 'recibido']);

            $table->string('name');
            $table->string('email');
            $table->string('telephone');

            $table->string('name_take');
            $table->string('email_take');
            $table->string('telephone_take');

            $table->enum('island', ['tenerife','grancanaría','lapalma', 'fuerteventura', 'lagomera' ,'lanzarote','elhierro']);
            $table->string('address');
            $table->integer('postcode')->unsigned();
            $table->string('moreinfo');

            $table->integer('total')->unsigned();
            $table->integer('total_shipping')->unsigned();

            $table->foreign('user_id')->references('id')->on('users');
            $table->softDeletes();
            $table->timestamps();
        });

        Schema::create('order_products', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('order_id')->unsigned();
            $table->integer('product_id')->unsigned();

            $table->string('title_es');
            $table->integer('quantity')->unsigned();
            $table->integer('price')->unsigned();
            $table->integer('dimension')->unsigned();

            //$table->foreign('product_id')->references('id')->on('products');
            $table->foreign('order_id')->references('id')->on('orders')->onDelete('cascade');
            $table->softDeletes();
            $table->timestamps();
        });

        Schema::create('order_payments', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('order_id')->unsigned();
            $table->integer('product_id')->unsigned();

            $table->string('title_es');
            $table->integer('quantity')->unsigned();
            $table->integer('price')->unsigned();
            $table->integer('dimension')->unsigned();

            //$table->foreign('product_id')->references('id')->on('products');
            $table->foreign('order_id')->references('id')->on('orders')->onDelete('cascade');
            $table->softDeletes();
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
        Schema::drop('order_products');
        Schema::drop('orders');

    }
}
