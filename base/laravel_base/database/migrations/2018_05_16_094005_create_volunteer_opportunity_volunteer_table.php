<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateVolunteerOpportunityVolunteerTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('volunteer_opportunity_volunteer', function(Blueprint $table)
		{
			$table->integer('volunteer_opportunity')->nullable();
			$table->integer('volunteer')->nullable()->index('volunteer_opportunity_volunteer_index_volunteer');
			$table->string('match_status', 20)->nullable()->index('volunteer_opportunity_volunteer_index_match_status');
			$table->dateTime('match_timestamp')->nullable();
			$table->boolean('match_hidden')->nullable();
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
		Schema::drop('volunteer_opportunity_volunteer');
	}

}
