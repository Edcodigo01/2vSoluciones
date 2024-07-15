<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateArticlesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('articles', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->text('title',60);
            $table->longText('content',25000);
            $table->text('autor',60);
            $table->text('imageP',60)->nullable();
            $table->text('imageA1',60)->nullable();
            $table->text('imageA2',60)->nullable();
            $table->text('imageA3',60)->nullable();
            $table->text('imageA4',60)->nullable();
            
            $table->unsignedBigInteger('category_id')->nullable();
            $table->foreign('category_id')->references('id')->on('categories');
            $table->enum('disabled', ['no', 'si'])->default('no');

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
        Schema::dropIfExists('articles');
    }
}
