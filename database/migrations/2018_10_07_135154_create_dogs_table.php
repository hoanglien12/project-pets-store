<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDogsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('dogs', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->bigInteger('price');
            $table->string('description')->nullable();
            $table->integer('sale')->nullable();
            $table->datetime('birthday')->nullable();
            $table->double('height')->nullable();
            $table->double('weight')->nullable();
            $table->string('photos');
            $table->string('slugs')->nullable();
            $table->integer('id_dog_cate')->unsigned();
            $table->foreign('id_dog_cate')->references('id')->on('dog_categories');
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
        Schema::dropIfExists('dogs');
    }
}
