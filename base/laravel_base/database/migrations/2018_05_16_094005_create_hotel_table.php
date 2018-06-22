<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateHotelTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('hotel', function(Blueprint $table)
		{
			$table->integer('id', true);
			$table->string('name', 200)->nullable();
			$table->text('address', 65535)->nullable();
			$table->text('city', 65535)->nullable();
			$table->text('state', 65535)->nullable();
			$table->text('zip', 65535)->nullable();
			$table->text('phone', 65535)->nullable();
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('hotel');
	}

}
