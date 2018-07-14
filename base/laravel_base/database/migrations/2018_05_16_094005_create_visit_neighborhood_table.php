<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateVisitNeighborhoodTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('visit_neighborhood', function(Blueprint $table)
		{
			$table->integer('visit')->nullable();
			$table->integer('neighborhood')->nullable()->index('visit_neighborhood_index_neighborhood');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('visit_neighborhood');
	}

}
