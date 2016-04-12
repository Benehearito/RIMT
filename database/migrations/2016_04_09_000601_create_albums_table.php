<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAlbumsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('albums', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('setting_id');
            $table->timestamps();
        });

        Schema::create('album_i18ns', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('album_id');
            $table->unsignedInteger('language_id');
            $table->string('field');     //
            $table->string('name');      // El contenido
            $table->softDeletes();
            $table->timestamps();
        });

        Schema::create('album_i18n_strings', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('album_i18n_id');//
            $table->string('content');
            $table->softDeletes();
            $table->timestamps();
        });
        
        Schema::create('album_i18n_texts', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('album_i18n_id');
            $table->text('content');
            $table->softDeletes();
            $table->timestamps();
        });

        Schema::table('albums', function (Blueprint $table) {
            $table->foreign('setting_id')->references('id')->on('settings');
        });

        Schema::table('album_i18ns', function (Blueprint $table) {
            $table->foreign('album_id')->references('id')->on('albums')->onDelete('cascade');
            $table->foreign('language_id')->references('id')->on('languages')->onDelete('cascade');
        });

        Schema::table('album_i18n_strings', function (Blueprint $table) {
            $table->foreign('album_i18n_id')->references('id')->on('album_i18ns')->onDelete('cascade');
        });

        Schema::table('album_i18n_texts', function (Blueprint $table) {
            $table->foreign('album_i18n_id')->references('id')->on('album_i18ns')->onDelete('cascade');
        });

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('albums');
        Schema::drop('album_i18ns');
        Schema::drop('albums_i18n_texts');
        Schema::drop('product_i18n_strings');
    }
}
