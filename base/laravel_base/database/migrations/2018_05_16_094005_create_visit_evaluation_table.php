<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateVisitEvaluationTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('visit_evaluation', function(Blueprint $table)
		{
			$table->integer('id', true);
			$table->integer('visit_rating')->nullable();
			$table->text('visit_rating_text', 65535)->nullable();
			$table->text('initial_location', 65535)->nullable();
			$table->text('initial_location_other', 65535)->nullable();
			$table->integer('language')->nullable();
			$table->text('neighborhoods', 65535)->nullable();
			$table->text('interests', 65535)->nullable();
			$table->text('notes', 65535)->nullable();
			$table->integer('visit')->nullable();
			$table->integer('volunteer')->nullable()->index('visit_evaluation_index_volunteer');
			$table->boolean('approved')->nullable();
			$table->dateTime('date_submitted')->nullable();
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('visit_evaluation');
	}

}
