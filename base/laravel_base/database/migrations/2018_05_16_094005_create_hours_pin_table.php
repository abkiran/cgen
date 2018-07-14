<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateHoursPinTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('hours_pin', function(Blueprint $table)
		{
			$table->integer('id', true);
			$table->integer('volunteer')->nullable();
			$table->float('pin_hours', 10, 0)->nullable();
			$table->date('date_assigned')->nullable();
			$table->text('notes', 65535)->nullable();
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('hours_pin');
	}

}
