<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Chamados extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('chamados', function($table){
            $table->increments('id');
            $table->string('usuario');
            $table->integer('categoria');
            $table->string('titulo');
            $table->integer('status');
            $table->string('mensagem');
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
		Schema::drop('chamados');
	}

}
