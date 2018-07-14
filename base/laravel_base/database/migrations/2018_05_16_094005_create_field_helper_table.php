<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateFieldHelperTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('field_helper', function(Blueprint $table)
		{
			$table->integer('id', true);
			$table->string('model', 200)->nullable();
			$table->string('field_key', 200)->nullable();
			$table->text('copy', 65535)->nullable();
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('field_helper');
	}

}
