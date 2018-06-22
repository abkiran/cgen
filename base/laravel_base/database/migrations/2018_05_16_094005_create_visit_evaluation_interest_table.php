<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateVisitEvaluationInterestTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('visit_evaluation_interest', function(Blueprint $table)
		{
			$table->integer('visit_evaluation')->nullable();
			$table->integer('interest')->nullable()->index('visit_evaluation_interest_index_interest');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('visit_evaluation_interest');
	}

}
