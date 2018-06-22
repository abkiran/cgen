<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateVolunteerOpportunityTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('volunteer_opportunity', function(Blueprint $table)
		{
			$table->integer('id', true);
			$table->dateTime('start_date')->nullable();
			$table->dateTime('end_date')->nullable();
			$table->text('location', 65535)->nullable();
			$table->text('description', 65535)->nullable();
			$table->text('status', 65535)->nullable();
			$table->boolean('archived')->nullable();
			$table->boolean('closed')->nullable();
			$table->integer('updated_on')->nullable()->index('updated_on_index');
			$table->integer('greeter_reminder_sent')->nullable();
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('volunteer_opportunity');
	}

}
