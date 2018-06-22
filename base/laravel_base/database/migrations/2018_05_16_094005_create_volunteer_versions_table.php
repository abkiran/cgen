<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateVolunteerVersionsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('volunteer_versions', function(Blueprint $table)
		{
			$table->integer('id')->nullable();
			$table->text('salutation', 65535)->nullable();
			$table->string('first_name', 100)->nullable();
			$table->string('last_name', 100)->nullable();
			$table->string('email', 200)->nullable();
			$table->string('address_1', 200)->nullable();
			$table->string('address_2', 200)->nullable();
			$table->string('city', 200)->nullable();
			$table->string('state_province', 200)->nullable();
			$table->string('postal_code', 50)->nullable();
			$table->string('country', 100)->nullable();
			$table->string('phone_1', 100)->nullable();
			$table->string('phone_1_type', 20)->nullable();
			$table->string('phone_2', 100)->nullable();
			$table->string('phone_2_type', 20)->nullable();
			$table->date('birthdate')->nullable();
			$table->string('emergency_contact_name', 100)->nullable();
			$table->string('emergency_contact_phone', 100)->nullable();
			$table->string('emergency_contact_phone_type', 20)->nullable();
			$table->string('emergency_contact_relationship', 100)->nullable();
			$table->text('occupation', 65535)->nullable();
			$table->text('work_experience', 65535)->nullable();
			$table->text('volunteer_experience', 65535)->nullable();
			$table->text('statement_of_intent', 65535)->nullable();
			$table->string('reference_name', 100)->nullable();
			$table->string('reference_phone', 100)->nullable();
			$table->string('reference_email', 100)->nullable();
			$table->text('interests', 65535)->nullable();
			$table->text('other_interests_specialties', 65535)->nullable();
			$table->text('neighborhoods', 65535)->nullable();
			$table->text('additional_neighborhood', 65535)->nullable();
			$table->string('participation', 100)->nullable();
			$table->boolean('monday_morning')->nullable();
			$table->boolean('monday_afternoon')->nullable();
			$table->boolean('tuesday_morning')->nullable();
			$table->boolean('tuesday_afternoon')->nullable();
			$table->boolean('wednesday_morning')->nullable();
			$table->boolean('wednesday_afternoon')->nullable();
			$table->boolean('thursday_morning')->nullable();
			$table->boolean('thursday_afternoon')->nullable();
			$table->boolean('friday_morning')->nullable();
			$table->boolean('friday_afternoon')->nullable();
			$table->boolean('saturday_morning')->nullable();
			$table->boolean('saturday_afternoon')->nullable();
			$table->boolean('sunday_morning')->nullable();
			$table->boolean('sunday_afternoon')->nullable();
			$table->boolean('short_notice')->nullable();
			$table->boolean('english')->nullable();
			$table->text('languages', 65535)->nullable();
			$table->boolean('sign_language')->nullable();
			$table->boolean('sight_guide')->nullable();
			$table->text('other_skill', 65535)->nullable();
			$table->text('additional_skills', 65535)->nullable();
			$table->text('referred_from', 65535)->nullable();
			$table->text('referred_from_other', 65535)->nullable();
			$table->text('felony', 65535)->nullable();
			$table->text('additional_comments', 65535)->nullable();
			$table->boolean('accessibility_needs')->nullable();
			$table->text('accessibility_needs_notes', 65535)->nullable();
			$table->dateTime('submitted_on')->nullable();
			$table->string('status', 100)->nullable();
			$table->string('current_step', 100)->nullable();
			$table->string('session_id', 100)->nullable();
			$table->integer('user')->nullable();
			$table->integer('version')->nullable();
			$table->text('photo', 65535)->nullable();
			$table->text('notes', 65535)->nullable();
			$table->date('volunteer_start_date')->nullable();
			$table->integer('five_year_pin')->nullable();
			$table->boolean('monday_evening')->nullable();
			$table->boolean('tuesday_evening')->nullable();
			$table->boolean('wednesday_evening')->nullable();
			$table->boolean('thursday_evening')->nullable();
			$table->boolean('friday_evening')->nullable();
			$table->boolean('saturday_evening')->nullable();
			$table->boolean('sunday_evening')->nullable();
			$table->integer('selected_year')->nullable();
			$table->date('selected_year_pin')->nullable();
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('volunteer_versions');
	}

}
