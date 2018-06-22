<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateInstagreeterVolunteerTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('instagreeter_volunteer', function(Blueprint $table)
		{
			$table->integer('instagreeter')->nullable();
			$table->integer('volunteer')->nullable()->index('instagreeter_volunteer_index_volunteer');
			$table->string('match_status', 20)->nullable()->index('instagreeter_volunteer_index_match_status');
			$table->boolean('match_hidden')->nullable();
			$table->text('status', 65535)->nullable();
			$table->dateTime('match_timestamp')->nullable();
			$table->text('match_from', 65535)->nullable();
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('instagreeter_volunteer');
	}

}
