<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCategoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('categories', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('slug');
            $table->mediumText('description');
            $table->string('image');
            $table->string('meta_title');
            $table->text('meta_description');
            $table->text('meta_keyword');

            $table->tinyInteger('navbar_status')->default('0');
            $table->tinyInteger('status')->default('0'); // showing and hiding categories from frondend side
            $table->integer('created_by');  // userid

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
        Schema::dropIfExists('categories');
    }
}
