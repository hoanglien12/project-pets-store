<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCommentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('comments', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('id_dog')->unsigned()->nullable();
            $table->integer('id_product')->unsigned()->nullable();
            $table->integer('id_post')->unsigned()->nullable();
            $table->integer('id_user')->unsigned();
            $table->string('comment');
            $table->string('slugs')->nullable();
            $table->foreign('id_dog')->references('id')->on('dogs');
            $table->foreign('id_product')->references('id')->on('products');
            $table->foreign('id_user')->references('id')->on('users');
            $table->foreign('id_post')->references('id')->on('posts');
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
        Schema::dropIfExists('comments');
    }
}
