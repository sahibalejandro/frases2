<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSentenceTagTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('sentence_tag', function(Blueprint $table)
		{
			$table->integer('sentence_id')->unsigned();
			$table->integer('tag_id')->unsigned();
			$table->primary(['sentence_id', 'tag_id']);
			$table->foreign('sentence_id')->references('id')->on('sentences');
			$table->foreign('tag_id')->references('id')->on('tags');
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('sentence_tag');
	}

}
