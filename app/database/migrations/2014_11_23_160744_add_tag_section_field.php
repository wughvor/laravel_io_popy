<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddTagSectionField extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('tags', function(Blueprint $table)
		{
			//
			$table->boolean('forum')->defaults(0);
			$table->boolean('articles')->defaults(0);
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('tags', function(Blueprint $table)
		{
			//
			$table->dropColumn('forum');
			$table->dropColumn('articles');
		});
	}

}
