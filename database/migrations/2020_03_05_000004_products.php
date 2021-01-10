<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Products extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('brand_id')->unsigned()->nullable();
            $table->integer('category_id')->unsigned()->nullable();
            $table->integer('subcategory_id')->unsigned()->nullable();
            $table->smallInteger('active')->unsigned()->default(1);
            $table->integer('position')->unsigned()->default(0);
            $table->string('slug');
            $table->string('name');
            $table->string('name_en');
            $table->mediumText('description')->nullable();
            $table->mediumText('description_en')->nullable();
            $table->mediumText('spec')->nullable();
            $table->mediumText('spec_en')->nullable();
            $table->string('imgPath');
            $table->string('pdf1Path')->nullable();
            $table->string('pdf2Path')->nullable();
            $table->timestamps();
            $table->index('id', 'id');
            $table->index('slug', 'slug');
            $table->index('brand_id', 'brand_id');
            $table->index('category_id','category_id');
            $table->index('subcategory_id', 'subcategory_id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('products');
    }
}
