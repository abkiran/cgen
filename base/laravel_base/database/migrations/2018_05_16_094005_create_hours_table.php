<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateHoursTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('hours', function(Blueprint $table)
		{
			$table->integer('id', true);
			$table->integer('volunteer')->nullable();
			$table->float('hours', 10, 0)->nullable();
			$table->integer('visit')->nullable();
			$table->integer('instagreeter')->nullable();
			$table->integer('volunteer_opportunity')->nullable();
			$table->dateTime('timestamp')->nullable();
			$table->text('notes', 65535)->nullable();
			$table->dateTime('event_date_time')->nullable();
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('hours');
	}

}
