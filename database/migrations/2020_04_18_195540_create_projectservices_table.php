<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProjectservicesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('projectservices', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('service_id');
            $table->text('name',100);
            $table->text('price',9)->nullable();
            $table->text('priceAgreed',9);
            $table->text('type',15);// respaldo, adicional, predeterminado
            $table->integer('backboard')->nullable();
            $table->integer('createdBy');
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
        Schema::dropIfExists('projectservices');
    }
}
