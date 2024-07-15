<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMessagescontactsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('messagescontacts', function (Blueprint $table) {
            $table->id();
            $table->text('email',60);
            $table->text('whatsapp',16)->nullable();
            $table->text('affair',99);
            $table->text('message',255);
            $table->text('send',2);
            $table->text('error',400);
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
        Schema::dropIfExists('messagescontacts');
    }
}
