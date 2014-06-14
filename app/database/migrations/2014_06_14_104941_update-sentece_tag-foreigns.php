<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class UpdateSenteceTagForeigns extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('sentence_tag', function(Blueprint $table)
		{
			$table->dropForeign('sentence_tag_sentence_id_foreign');
			$table->dropForeign('sentence_tag_tag_id_foreign');

            $table->foreign('sentence_id')
                ->references('id')->on('sentences')
                ->onDelete('cascade')
                ->onUpdate('cascade');

            $table->foreign('tag_id')
                ->references('id')->on('tags')
                ->onDelete('cascade')
                ->onUpdate('cascade');
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('sentence_tag', function(Blueprint $table)
		{
			//
		});
	}

}
