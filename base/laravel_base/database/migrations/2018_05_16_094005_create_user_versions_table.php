<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateUserVersionsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('user_versions', function(Blueprint $table)
		{
			$table->integer('id');
			$table->string('user', 50)->nullable();
			$table->string('pass', 50)->nullable();
			$table->integer('user_group')->nullable();
			$table->text('status', 65535);
			$table->text('email', 65535)->nullable();
			$table->text('first_name', 65535)->nullable();
			$table->text('last_name', 65535)->nullable();
			$table->integer('version');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('user_versions');
	}

}
