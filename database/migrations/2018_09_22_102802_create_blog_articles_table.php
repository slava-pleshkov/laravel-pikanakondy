<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBlogArticlesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('blog_articles', function (Blueprint $table) {
            $table->increments('id');
            $table->string('title');
            $table->string('url')->unique();
            $table->string('images');
            $table->text('text');
            $table->unsignedInteger('category_id');
            $table->unsignedInteger('seo_id');
            $table->integer('views')->nullable();
            $table->integer('slide');
            $table->integer('status');
            $table->unsignedInteger('user_id');
            $table->foreign('category_id')->references('id')->on('blog_categories');
            $table->foreign('seo_id')->references('id')->on('seos');
            $table->foreign('user_id')->references('id')->on('users');
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
        Schema::dropIfExists('blog_articles');
    }
}