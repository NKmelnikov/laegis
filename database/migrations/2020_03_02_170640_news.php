<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class News extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('news', function (Blueprint $table) {
            $table->increments('id');
            $table->smallInteger('active')->unsigned()->default(1);
            $table->integer('position')->unsigned()->default(0);
            $table->string('slug', 200)->unique();
            $table->string('category')->nullable();
            $table->string('title');
            $table->string('title_en');
            $table->mediumText('shortText')->nullable();
            $table->mediumText('shortText_en')->nullable();
            $table->mediumText('article');
            $table->mediumText('article_en');
            $table->string('imgPath');
            $table->timestamps();
            $table->index('slug', 'news_slug');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('news');
    }
}
