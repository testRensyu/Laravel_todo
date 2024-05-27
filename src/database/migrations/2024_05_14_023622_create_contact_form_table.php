<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateContactFormTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('contactforms', function (Blueprint $table) {
            //id
            $table->increments('id');
            //name
            $table->string('name', 20);
            //メールアドレスmail_address
            $table->string('mail_address', 100);
            //性別sex(男性１ / 女性２)
            $table->integer('sex');
            //問い合わせcates(複数選択可)
            $table->string('cates', 100); 
            //住まいエリアpref
            $table->string('pref', 10); 
            //メッセージmessage
            $table->string('message', 250); 
            //画像image
            $table->string('image', 250); 
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('contactforms');
    }
}
