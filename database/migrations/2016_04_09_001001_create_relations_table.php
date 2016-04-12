<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRelationsTable extends Migration
{
    public function up()
    {
        
        
        /*
        Schema::create('categories_images', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('order');
            $table->integer('categories_id')->unsigned();
            $table->foreign('categories_id')->references('id')->on('categories');
            $table->integer('images_id')->unsigned();
            $table->foreign('images_id')->references('id')->on('images');
            $table->timestamps();
        });*/
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
       
    }
}
