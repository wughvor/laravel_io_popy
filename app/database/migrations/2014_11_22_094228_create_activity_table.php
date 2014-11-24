<?php

use Illuminate\Database\Migrations\Migration;

class CreateActivityTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('activity', function($table)
		{
			//
			$table->create();

			$table->increments('id');
			$table->integer('user_id');
			$table->integer('activity_type');
			$table->integer('activity_id');
			$table->text('description');

			$table->timestamps();
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('activity');
	}

}
