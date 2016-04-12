<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {

        //tabla para guardar los usuarios
        Schema::create('users', function (Blueprint $table) {
            $table->increments('id');
            $table->string('email')->unique();
            $table->string('name');
            $table->string('lastname');
            $table->string('password', 60);
            $table->string('banned');
            $table->string('registration_token')->nullable();
            $table->rememberToken();
            $table->softDeletes();
            $table->timestamps();
        });

        // Numeros de telefono
        Schema::create('user_telephones', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id')->unsigned();
            $table->string('prefix',10);
            $table->string('number');
            $table->string('order');
            $table->softDeletes();
            $table->timestamps();
        });

        // Datos de facturación
        Schema::create('user_invoices', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id')->unsigned();
            $table->string('fullName');
            $table->enum('taxIdentificationType', ['NIF', 'CIF']);
            $table->string('taxIdentification'); //CIF o NIF
            $table->string('postalAddress'); // Dirección postal
            $table->softDeletes();
            $table->timestamps();
        });

        Schema::create('password_resets', function (Blueprint $table) {
            $table->string('email')->index();
            $table->string('token')->index();
            $table->timestamp('created_at');
        });

        Schema::table('user_telephones', function (Blueprint $table) {
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
        });

        Schema::table('user_invoices', function (Blueprint $table) {
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
        });
        
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('password_resets');
        Schema::drop('user_telephones');
        Schema::drop('user_invoices');
        Schema::drop('users');

    }
}
