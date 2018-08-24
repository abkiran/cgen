<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateVisitEvaluationNeighborhoodTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('visit_evaluation_neighborhood', function(Blueprint $table)
		{
			$table->integer('visit_evaluation')->nullable();
			$table->integer('neighborhood')->nullable()->index('visit_evaluation_neighborhood_index_neighborhood');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('visit_evaluation_neighborhood');
	}

}
