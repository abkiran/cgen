<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateForumTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('forum', function(Blueprint $table)
		{
			$table->integer('id', true);
			$table->text('title', 65535)->nullable();
			$table->text('body', 65535)->nullable();
			$table->integer('parent')->nullable();
			$table->integer('user')->nullable();
			$table->integer('timestamp')->nullable();
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('forum');
	}

}
