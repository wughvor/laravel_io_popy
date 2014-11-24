<?php

use Illuminate\Database\Migrations\Migration;

class CreatePastesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('pastes', function($table)
		{
			$table->create();

			$table->increments('id');
			$table->integer('author_id')->nullable();
			$table->integer('parent_id')->nullable();
			$table->text('description')->nullable();
			$table->text('code');
			$table->integer('comment_count');
			$table->integer('child_count');

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
		Schema::drop('pastes');
	}

}
