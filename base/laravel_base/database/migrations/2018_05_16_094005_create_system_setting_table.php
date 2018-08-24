<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateSystemSettingTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('system_setting', function(Blueprint $table)
		{
			$table->integer('id', true);
			$table->text('key', 65535)->nullable();
			$table->text('label', 65535)->nullable();
			$table->text('value', 65535)->nullable();
			$table->text('widget', 65535)->nullable();
			$table->text('widget_description', 65535)->nullable();
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('system_setting');
	}

}
