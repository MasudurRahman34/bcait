<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddForeignKeysToRecivedTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('recived', function(Blueprint $table)
		{
			$table->foreign('recived_head_id')->references('id')->on('recived_head')->onUpdate('RESTRICT')->onDelete('CASCADE');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('recived', function(Blueprint $table)
		{
			$table->dropForeign('recived_recived_head_id_foreign');
		});
	}

}
