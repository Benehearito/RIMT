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
        // tabla para guardar las ventas
        /*
         * SOLO SE PODRA BORRAR SI NO HA PAGADO.
         *
         */
        Schema::create('orders', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id')->unsigned();
            $table->enum('status', ['carrito','pendienteBanco','pago','cancelado', 'enviado' ,'devuelto', 'recibido']);
            $table->boolean('shipping');                                  //booleano para saber si es envio o tienda
            $table->foreign('user_id')->references('id')->on('users');
            $table->softDeletes();
            $table->timestamps();
        });

        // tabla para guardar datos de la factura
        /*
         * acordarse de que una factura tiene una serie para cuando se hagan devoluciones
         * o rectificativas
         * en rectificativas se pondran los productos de la anterior factura y se ñadiran los nuevos
         * el software calculara el total
         */
        Schema::create('order_invoices', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('order_id')->unsigned();
            $table->integer('user_id')->unsigned();  // Usuario que compro
            $table->string('fullName'); // Nombre de la empresa o profesional
            // (CIF en el caso de las empresas o personas jurídicas y NIF si el que está facturando es un profesional autónomo o persona física.
            $table->enum('taxIdentificationType', ['NIF', 'CIF']);
            $table->string('taxIdentification'); //CIF o NIF
            $table->string('postalAddress'); // Dirección postal
            $table->enum('series', ['P','F','R']);
            // P ->factura proforma          - solo se generara si el cliente decide pagar en el banco -
            // F ->factura                   - se genera cuando se confirma el pago del cliente por cualquier medio.
            // R ->factura rectificativa     - se genera con rectificativas o devoluciones
            $table->integer('number')->unsigned();   //numero de la factura de emision
            $table->foreign('order_id')->references('id')->on('orders')->onDelete('cascade');
            $table->foreign('user_id')->references('id')->on('users');
            $table->softDeletes();
            $table->timestamps();
            /* Datos que debe incluir la factura */
            /*
                Modo de pago
                Cuenta bancaria a la que hacer el ingreso del pago, si procede.
                Registro mercantil de la sociedad
                Teléfonos de contacto o correos
                Garantía o días en los que es posible realizar la devolución
             */
        });

        // tabla para datos de la entreda
        Schema::create('order_sendGivens', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('order_id')->unsigned();
            $table->enum('island', ['tenerife','grancanaría','lapalma', 'fuerteventura', 'lagomera' ,'lanzarote','elhierro']);

            $table->string('address');
            $table->integer('postCode')->unsigned();
            $table->string('fullName');
            $table->string('telephone');
            $table->string('moreInfo');
            $table->foreign('order_id')->references('id')->on('orders')->onDelete('cascade');
            $table->softDeletes();
            $table->timestamps();
        });

        // productos de la compra
        Schema::create('order_products', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('order_id')->unsigned();
            $table->integer('product_id')->unsigned();
            $table->integer('order_invoice_id')->unsigned();
            $table->string('title_es');
            $table->integer('quantity')->unsigned();
            $table->decimal('price', 10, 2);
            $table->decimal('discount', 2, 2);
            $table->integer('dimension')->unsigned();
            $table->foreign('product_id')->references('id')->on('products');
            $table->foreign('order_id')->references('id')->on('orders')->onDelete('cascade');
            $table->foreign('order_invoice_id')->references('id')->on('order_invoices');
            $table->softDeletes();
            $table->timestamps();
        });

        // datos del pago
        Schema::create('order_payments', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('order_id')->unsigned();
            $table->integer('order_invoice_id')->unsigned();
            $table->decimal('amount', 10, 2);
            $table->enum('type', ['online','transferencia','ingreso','caja']);
            $table->string('dato1'); // a la espera de ver que guardamos de cada unos
            $table->string('dato2');
            $table->foreign('order_id')->references('id')->on('orders')->onDelete('cascade');
            $table->foreign('order_invoice_id')->references('id')->on('order_invoices');
            $table->softDeletes();
            $table->timestamps();
        });

        // datos del pago
        Schema::create('order_shippingPayments', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('order_payments_id')->unsigned();
            $table->string('dato1'); // a la espera de ver que guardamos
            $table->decimal('amount', 10, 2);
            $table->foreign('order_payments_id')->references('id')->on('orders')->onDelete('cascade');
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
        Schema::drop('order_shippingPayments');
        Schema::drop('order_payments');
        Schema::drop('order_products');
        Schema::drop('order_sendGivens');
        Schema::drop('order_invoices');
        Schema::drop('orders');
    }
}

