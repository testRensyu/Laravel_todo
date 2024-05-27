<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRepliesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('replies', function (Blueprint $table) {
            $table->Increments('id');
            $table->unsignedInteger('board_id');
            $table->string('name', 30); 
            $table->string('title', 120); 
            $table->text('message', 250);
            $table->string('image', 200)->nullable(); //nullを許容
            $table->string('email', 120)->nullable(); //nullを許容
            $table->string('website', 256)->nullable(); //nullを許容
            $table->string('text_color', 30);
            $table->string('delete_key', 8);
            $table->integer('del_flg')->default(0);  // デフォ0。1だったらview側削除する
            $table->timestamps();

            $table->foreign('board_id')->references('id')->on('boards');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('replies');
    }
}
