<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePostsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('posts', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('sort_id')->unsigned();
            $table->integer('user_id')->unsigned();
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->integer('city_id')->unsigned();
            $table->foreign('city_id')->references('id')->on('cities');
            $table->integer('section_id')->unsigned();
            $table->foreign('section_id')->references('id')->on('section');
            $table->integer('service_id')->unsigned();
            $table->foreign('service_id')->references('id')->on('services');
            $table->string('slug');
            $table->string('title');
            $table->string('title_description');
            $table->string('meta_description');
            $table->string('price');
            $table->string('deal');
            $table->text('description');
            $table->text('image')->nullable();
            $table->text('images');
            $table->string('address');
            $table->string('phone');
            $table->string('email');
            $table->char('comment', 20);
            $table->char('lang', 2);
            $table->integer('views');
            $table->integer('status');
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
        Schema::drop('posts');
    }
}
