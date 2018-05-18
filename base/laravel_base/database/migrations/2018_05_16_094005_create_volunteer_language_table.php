<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateVolunteerLanguageTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('volunteer_language', function(Blueprint $table)
		{
			$table->integer('volunteer')->nullable();
			$table->integer('language')->nullable()->index('volunteer_language_index_language');
			$table->string('fluency', 100)->nullable();
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('volunteer_language');
	}

}
