<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSentencesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('sentences', function(Blueprint $table)
		{
			$table->increments('id');
			$table->string('content', 255);
			$table->integer('author_id')->unsigned();
			$table->integer('positive_votes')->unsigned()->default(0);
			$table->integer('negative_votes')->unsigned()->default(0);
			$table->foreign('author_id')->references('id')->on('authors');
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
		Schema::drop('sentences');
	}

}
