<?php

use Illuminate\Database\Migrations\Migration;

class CreateCommentsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('comments', function($table)
		{
			//
			$table->create();

			$table->increments('id');
			$table->string('title')->nullable();
			$table->text('body');
			$table->string('owner_type');
			$table->integer('owner_id');
			$table->integer('author_id');
			$table->integer('parent_id')->nullable();
			$table->integer('child_count')->defaults(0);
			$table->integer('most_recent_child_id')->nullable();

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
		Schema::drop('comments');
	}

}
