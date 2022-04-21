<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMessagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('messages', function (Blueprint $table) {
            $table->id();
<<<<<<< HEAD:database/migrations/2020_09_08_130927_create_messages_table.php
            $table->integer('from')->unsigned();
            $table->integer('to')->unsigned();
            $table->text('text')->nullable();
            $table->string('image')->nullable();
            // $table->tinyInteger('is_read');
=======
            $table->integer('user_id')->unsigned();
            $table->text('body');
>>>>>>> parent of 202f799... still working..:database/migrations/2020_09_05_063722_create_messages_table.php
            $table->timestamps();
            $table->foreign('user_id')
                    ->references('id')
                    ->on('users')
                    ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('messages');
    }
}
