<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateConfigsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {

        // Keys  de la aplicación
        Schema::create('keywords', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->boolean('protected');
            $table->softDeletes();
            $table->timestamps();
        });

        // Lenguajes de la aplicación
        Schema::create('languages', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('keyword_id');  // referencia al keyword
            $table->string('code2');
            $table->string('code3');
            $table->string('codeISO');
            $table->softDeletes();
            $table->timestamps();
        });
        // Tabla plana para títulos de los elementos la página
        // Se forma con un idioma y una keywords
        Schema::create('i18ns', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('language_id'); // referencia al lenguaje
            $table->unsignedInteger('keyword_id');  // referencia al keyword
            $table->string('field');     //
            $table->string('name');      //
            $table->softDeletes();
            $table->timestamps();
        });

        Schema::create('i18n_strings', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('i18n_id'); // referencia al i18n
            $table->string('content');
            $table->softDeletes();
            $table->timestamps();
        });

        Schema::create('i18n_texts', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('i18n_id'); // referencia al i18n
            $table->text('content');
            $table->softDeletes();
            $table->timestamps();
        });

        Schema::create('roles', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('keyword_id');   // referencia para el título en multi-idoma
            $table->string('role')->unique();
            $table->softDeletes();
            $table->timestamps();
        });
        Schema::create('models', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('keyword_id');   // referencia para el título en multi-idoma
            $table->string('model')->unique();
            $table->softDeletes();
            $table->timestamps();
        });

        Schema::create('settings', function (Blueprint $table) {
            //Tabla para configuración de categorías  settings
            $table->increments('id');
            $table->unsignedInteger('model_id');   // referencia para el modelo
            $table->unsignedInteger('keyword_id'); // referencia para el título en multi-idoma
            $table->text('setting');
            $table->softDeletes();
            $table->timestamps();
        });

        Schema::table('languages', function ($table) {
            $table->foreign('keyword_id')->references('id')->on('keywords');
        });

        Schema::table('roles', function ($table) {
            $table->foreign('keyword_id')->references('id')->on('keywords');

        });

        Schema::table('i18ns', function ($table) {
            $table->foreign('language_id')->references('id')->on('languages');
            $table->foreign('keyword_id')->references('id')->on('keywords');
        });

        Schema::table('i18n_texts', function ($table) {
            $table->foreign('i18n_id')->references('id')->on('i18ns')->onDelete('cascade');

        });

        Schema::table('i18n_strings', function ($table) {
            $table->foreign('i18n_id')->references('id')->on('i18ns')->onDelete('cascade');

        });

        Schema::table('settings', function ($table) {
            $table->foreign('model_id')->references('id')->on('models')->onDelete('cascade');
            $table->foreign('keyword_id')->references('id')->on('keywords')->onDelete('cascade');

        });
        

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('i18ns');
        Schema::drop('roles');
        Schema::drop('languages');
    }
}
