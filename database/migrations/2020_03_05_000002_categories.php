<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Categories extends Migration
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
            $table->smallInteger('active')->unsigned()->default(1);
            $table->integer('position')->unsigned()->default(0);
            $table->string('slug');
            $table->string('name');
            $table->string('name_en');
            $table->mediumText('description')->nullable();
            $table->mediumText('description_en')->nullable();
            $table->timestamps();
            $table->index('id', 'id_categories');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('categories');
    }
}
