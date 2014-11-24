<?php

use Illuminate\Database\Migrations\Migration;

class AddImageUrlFieldToUsers extends Migration {

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
			$table->string('image_url')->nullable();
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
			$table->dropColumn('image_url');
		});
	}

}
