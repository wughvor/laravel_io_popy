<?php

use Illuminate\Database\Migrations\Migration;

class AddIsBannedFieldToUsersTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('users', function($table)
		{
			//
			$table->integer('is_banned')->defaults(0);
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('users', function($table)
		{
			//
			$table->dropcolumn('is_banned');
		});
	}

}
