<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Brands extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('brands', function (Blueprint $table) {
            $table->increments('id');
            $table->smallInteger('active')->unsigned()->default(1);
            $table->integer('position')->unsigned()->default(0);
            $table->string('slug', 200)->unique();
            $table->string('name');
            $table->string('name_en');
            $table->mediumText('description')->nullable();
            $table->mediumText('description_en')->nullable();
            $table->string('imgPath')->nullable();
            $table->timestamps();
            $table->index('id', 'id_brand');
            $table->index('slug', 'slug_brands');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('catalogs');
    }
}
