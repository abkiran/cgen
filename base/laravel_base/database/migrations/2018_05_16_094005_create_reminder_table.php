<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateReminderTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('reminder', function(Blueprint $table)
		{
			$table->integer('id', true);
			$table->date('reminder_date')->nullable();
			$table->integer('visit')->nullable();
			$table->integer('volunteer')->nullable();
			$table->text('message', 65535)->nullable();
			$table->integer('instagreeter')->nullable();
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('reminder');
	}

}
