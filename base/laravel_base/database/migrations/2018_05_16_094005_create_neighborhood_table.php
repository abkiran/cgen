<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateNeighborhoodTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('neighborhood', function(Blueprint $table)
		{
			$table->integer('id', true);
			$table->string('neighborhood', 200)->nullable();
			$table->text('description', 65535)->nullable();
			$table->text('photo', 65535)->nullable();
			$table->text('map_image', 65535)->nullable();
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('neighborhood');
	}

}
