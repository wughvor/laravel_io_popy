<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ForumThreadsCreateTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('forum_threads', function(Blueprint $table)
		{
			//
			$table->create();
			$table->increments('id');
			$table->integer('author_id');
			$table->string('subject');
			$table->text('body');
			$table->string('slug');
			$table->string('category_slug');
			$table->integer('laravel_version');
			$table->integer('most_recent_reply_id');
			$table->integer('reply_count');
			$table->timestamps();
			$table->softDeletes();
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('forum_threads');
	}

}
