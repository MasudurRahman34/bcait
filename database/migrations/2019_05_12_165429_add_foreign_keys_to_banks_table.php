<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddForeignKeysToBanksTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('banks', function(Blueprint $table)
		{
			$table->foreign('branch_id')->references('id')->on('branch')->onUpdate('RESTRICT')->onDelete('CASCADE');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('banks', function(Blueprint $table)
		{
			$table->dropForeign('banks_branch_id_foreign');
		});
	}

}
