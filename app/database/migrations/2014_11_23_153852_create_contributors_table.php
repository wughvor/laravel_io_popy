<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateContributorsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('contributors', function(Blueprint $table)
		{
			//
			$table->create();

			$table->increments('id');
			$table->integer('user_id')->nullable();
			$table->string('github_id');
			$table->string('name');
			$table->string('avatar_url');
			$table->string('github_url');
			$table->integer('contribution_count')->defaults(0);

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
		Schema::drop('contributors');
	}

}
