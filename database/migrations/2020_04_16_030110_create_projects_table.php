<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProjectsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('projects', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->text('name',90);
            $table->date('start')->nullable();
            $table->date('end')->nullable();
            $table->date('deliveryDate')->nullable();
            $table->date('dateFinished')->nullable();
            $table->text('state',10)->nullable();
            $table->text('created_by',5)->nullable();
            $table->text('totalPrice',20)->nullable();
            $table->text('totalAgreed',20)->nullable();
            $table->unsignedBigInteger('user_id')->nullable();
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
        Schema::dropIfExists('projects');
    }
}
