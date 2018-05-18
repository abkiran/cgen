<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateVolunteerVisitTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('volunteer_visit', function(Blueprint $table)
		{
			$table->integer('volunteer')->nullable()->index('volunteer_visit_index_volunteer');
			$table->integer('visit')->nullable()->index('visit');
			$table->string('match_status', 20)->nullable()->index('volunteer_visit_index_match_status');
			$table->boolean('match_hidden')->nullable();
			$table->text('match_from', 65535)->nullable();
			$table->dateTime('match_timestamp')->nullable();
			$table->text('volunteer_primary', 65535)->nullable();
			$table->dateTime('match_datetime')->nullable();
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('volunteer_visit');
	}

}
