<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Subcategories extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('subcategories', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('category_id')->unsigned()->nullable();
            $table->smallInteger('active')->unsigned()->default(1);
            $table->integer('position')->unsigned()->default(0);
            $table->string('slug');
            $table->string('name');
            $table->string('name_en');
            $table->mediumText('description')->nullable();
            $table->mediumText('description_en')->nullable();
            $table->timestamps();
            $table->index('id', 'id_subcategories');
            $table->index('category_id', 'category_id_subcategories');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('subcategories');
    }
}
