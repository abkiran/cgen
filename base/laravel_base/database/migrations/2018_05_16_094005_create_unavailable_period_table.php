<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateUnavailablePeriodTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('unavailable_period', function(Blueprint $table)
		{
			$table->integer('id', true);
			$table->integer('volunteer')->nullable();
			$table->date('start_date')->nullable();
			$table->date('end_date')->nullable();
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('unavailable_period');
	}

}
