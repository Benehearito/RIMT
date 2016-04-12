<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCategoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        
        Schema::create('categories', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('setting_id')->nullable();
            $table->unsignedInteger('order');
            $table->boolean('active');
            $table->softDeletes();
            $table->timestamps();
        });

        Schema::create('category_i18ns', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('category_id');
            $table->unsignedInteger('language_id')->nullable();
            $table->string('field');     //
            $table->string('name');      // El contenido
            $table->softDeletes();
            $table->timestamps();
        });

        Schema::create('category_i18n_strings', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('category_i18n_id');//
            $table->string('content');
            $table->softDeletes();
            $table->timestamps();
        });

        Schema::create('category_i18n_texts', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('category_i18n_id');
            $table->text('content');
            $table->softDeletes();
            $table->timestamps();
        });
        
        Schema::table('categories', function (Blueprint $table) {
            $table->foreign('setting_id')->references('id')->on('settings');
        });

        Schema::table('category_i18ns', function (Blueprint $table) {
            $table->foreign('language_id')->references('id')->on('languages');
            $table->foreign('category_id')->references('id')->on('categories')->onDelete('cascade');
        });

        Schema::table('category_i18n_texts', function (Blueprint $table) {
            $table->foreign('category_i18n_id')->references('id')->on('category_i18ns')->onDelete('cascade');
        });

        Schema::table('category_i18n_strings', function (Blueprint $table) {
            $table->foreign('category_i18n_id')->references('id')->on('category_i18ns')->onDelete('cascade');
        });
        
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('category_i18n_strings');
        Schema::drop('category_i18n_texts');
        Schema::drop('category_i18ns');
        Schema::drop('categories');
        Schema::drop('category_settings');
    }
}
