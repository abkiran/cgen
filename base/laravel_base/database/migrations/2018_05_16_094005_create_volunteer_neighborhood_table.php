<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateVolunteerNeighborhoodTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('volunteer_neighborhood', function(Blueprint $table)
		{
			$table->integer('volunteer')->nullable();
			$table->integer('neighborhood')->nullable()->index('volunteer_neighborhood_index_neighborhood');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('volunteer_neighborhood');
	}

}
