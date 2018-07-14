<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateNoteTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('note', function(Blueprint $table)
		{
			$table->integer('id', true);
			$table->integer('timestamp')->nullable();
			$table->integer('user')->nullable();
			$table->text('model_name', 65535)->nullable();
			$table->integer('model_id')->nullable();
			$table->text('message', 65535)->nullable();
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('note');
	}

}
