<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCommentTagTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('comment_tag', function(Blueprint $table)
		{
			//
			$table->create();

			$table->increments('id');
			$table->integer('comment_id')->index();
			$table->integer('tag_id')->index();

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
		Schema::drop('comment_tag');
	}

}
