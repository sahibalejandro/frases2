<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddUserToSentencesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('sentences', function(Blueprint $table)
		{
            DB::table('sentence_tag')->delete();
            DB::table('sentences')->delete();

			$table->integer('user_id')->unsigned();
            $table->foreign('user_id')->references('id')->on('users');
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('sentences', function(Blueprint $table)
		{
			$table->dropColumn('user_id');
		});
	}

}
