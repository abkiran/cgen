<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateVisitVersionsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('visit_versions', function(Blueprint $table)
		{
			$table->integer('id')->nullable()->index('model_id');
			$table->string('live_in_united_states', 3)->nullable();
			$table->text('salutation', 65535);
			$table->string('first_name', 100)->nullable();
			$table->string('last_name', 100)->nullable();
			$table->string('full_name', 200)->nullable();
			$table->string('email', 200)->nullable();
			$table->string('email_2', 200);
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
			$table->enum('enable_sms', array('No','Yes'))->default('No');
			$table->text('group_info', 65535)->nullable();
			$table->integer('number_adults')->nullable();
			$table->integer('number_children')->nullable();
			$table->string('age_ranges', 100)->nullable();
			$table->date('arrival_date')->nullable();
			$table->date('departure_date')->nullable();
			$table->dateTime('visit_date_time_1')->nullable();
			$table->dateTime('visit_date_time_2')->nullable();
			$table->dateTime('visit_date_time_3')->nullable();
			$table->string('accommodation', 50)->nullable();
			$table->string('accommodation_phone', 100)->nullable();
			$table->string('accommodation_phone_type', 100)->nullable();
			$table->string('accommodation_hotel_name', 200)->nullable();
			$table->string('accommodation_hotel_address', 200)->nullable();
			$table->string('accommodation_hotel_city', 200)->nullable();
			$table->string('accommodation_hotel_reservation_name', 100)->nullable();
			$table->string('accommodation_friend_relative_address_1', 200)->nullable();
			$table->string('accommodation_friend_relative_address_2', 200)->nullable();
			$table->string('accommodation_friend_relative_city', 100)->nullable();
			$table->string('accommodation_friend_relative_state_province', 200)->nullable();
			$table->string('accommodation_friend_relative_postal_code', 10)->nullable();
			$table->text('accommodation_other_notes', 65535)->nullable();
			$table->integer('interest_1')->nullable();
			$table->integer('interest_2')->nullable();
			$table->integer('interest_3')->nullable();
			$table->text('other_interests', 65535)->nullable();
			$table->integer('neighborhood_1')->nullable();
			$table->integer('neighborhood_2')->nullable();
			$table->integer('neighborhood_3')->nullable();
			$table->integer('language')->nullable();
			$table->boolean('language_english_acceptable')->nullable();
			$table->enum('proficiency', array('Expert','Moderate','Novice'))->nullable();
			$table->boolean('accessibility_needs')->nullable();
			$table->string('accessibility_needs_notes', 200)->nullable();
			$table->boolean('media_visit')->nullable();
			$table->string('referred_from', 100)->nullable();
			$table->string('referred_from_other', 100)->nullable();
			$table->text('visit_notes', 65535)->nullable();
			$table->dateTime('submitted_on')->nullable();
			$table->string('status', 100)->nullable();
			$table->string('current_step', 100)->nullable();
			$table->string('session_id', 100)->nullable();
			$table->integer('version')->nullable();
			$table->text('browser_info', 65535)->nullable();
			$table->dateTime('confirmed_date')->nullable();
			$table->text('date_notes', 65535)->nullable();
			$table->boolean('archived')->nullable();
			$table->text('internal_staff_notes', 65535)->nullable();
			$table->text('hotsheet_notes', 65535)->nullable();
			$table->boolean('closed')->nullable();
			$table->boolean('confirmed')->nullable();
			$table->string('accommodation_hotel_phone', 100)->nullable();
			$table->dateTime('reminder_email_sent')->nullable();
			$table->integer('updated_on')->nullable();
			$table->integer('greeter_reminder_sent')->nullable();
			$table->dateTime('visitor_evaluation_link_sent')->nullable();
			$table->dateTime('greeter_evaluation_link_sent')->nullable();
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('visit_versions');
	}

}
