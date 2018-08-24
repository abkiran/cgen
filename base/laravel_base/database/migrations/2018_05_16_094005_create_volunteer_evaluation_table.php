<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateVolunteerEvaluationTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('volunteer_evaluation', function(Blueprint $table)
		{
			$table->integer('id', true);
			$table->integer('volunteer_rating')->nullable();
			$table->text('volunteer_rating_text', 65535)->nullable();
			$table->integer('experience_rating')->nullable();
			$table->text('experience_rating_text', 65535)->nullable();
			$table->text('visit_description', 65535)->nullable();
			$table->text('visit_reflected_interests', 65535)->nullable();
			$table->text('visit_reflected_interests_other', 65535)->nullable();
			$table->boolean('visit_influence_restaurants')->nullable();
			$table->text('visit_influence_restaurants_text', 65535)->nullable();
			$table->boolean('visit_influence_museums')->nullable();
			$table->text('visit_influence_museums_text', 65535)->nullable();
			$table->boolean('visit_influence_tours')->nullable();
			$table->text('visit_influence_tours_text', 65535)->nullable();
			$table->boolean('visit_influence_neighborhoods')->nullable();
			$table->text('visit_influence_neighborhoods_text', 65535)->nullable();
			$table->boolean('visit_influence_events')->nullable();
			$table->text('visit_influence_events_text', 65535)->nullable();
			$table->boolean('use_program_again')->nullable();
			$table->boolean('public_transportation_during')->nullable();
			$table->boolean('public_transportation_after')->nullable();
			$table->boolean('other_city')->nullable();
			$table->text('other_city_text', 65535)->nullable();
			$table->boolean('recommend_service')->nullable();
			$table->text('additional_notes', 65535)->nullable();
			$table->integer('visit')->nullable()->index('volunteer_evaluation_index_visit');
			$table->boolean('approved')->nullable();
			$table->boolean('visit_influence')->nullable();
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
		Schema::drop('volunteer_evaluation');
	}

}
