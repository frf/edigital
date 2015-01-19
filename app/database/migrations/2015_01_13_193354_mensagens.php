<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Mensagens extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('mensagens', function($table){
            $table->increments('id');
            $table->text('mensagem');
            $table->integer('id_chamado');
            $table->integer('status');
            $table->string('no_usuario');
            $table->string('data');
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
		Schema::drop('historicos');
	}

}
