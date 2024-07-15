<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

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
            $table->bigIncrements('id');
            $table->text('name',50);
            // auditoria

            $table->unsignedBigInteger('cretated_for_id')->nullable();
            $table->foreign('cretated_for_id')->references('id')->on('users');

            $table->unsignedBigInteger('updated_for_id')->nullable();
            $table->foreign('updated_for_id')->references('id')->on('users');

            $table->unsignedBigInteger('deleted_for_id')->nullable();
            $table->foreign('deleted_for_id')->references('id')->on('users');

            $table->enum('disabled', ['no', 'si'])->default('no');


            $table->string('disabled_at')->nullable();
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
