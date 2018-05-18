<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateEmailCronTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('email_cron', function(Blueprint $table)
		{
			$table->integer('id', true);
			$table->integer('release_date')->nullable();
			$table->text('recipients', 65535)->nullable();
			$table->text('subject', 65535)->nullable();
			$table->text('message', 65535)->nullable();
			$table->integer('status')->nullable();
			$table->text('from_name', 65535)->nullable();
			$table->text('from_email', 65535)->nullable();
			$table->text('cc', 65535)->nullable();
			$table->text('bcc', 65535)->nullable();
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('email_cron');
	}

}
