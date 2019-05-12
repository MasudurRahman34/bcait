<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddForeignKeysToEmployeesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('employees', function(Blueprint $table)
		{
			$table->foreign('branch_id')->references('id')->on('branch')->onUpdate('RESTRICT')->onDelete('CASCADE');
			$table->foreign('deperment_id')->references('id')->on('depertments')->onUpdate('RESTRICT')->onDelete('CASCADE');
			$table->foreign('emploment_mode_id')->references('id')->on('employment_modes')->onUpdate('RESTRICT')->onDelete('CASCADE');
			$table->foreign('rank_id')->references('id')->on('ranks')->onUpdate('RESTRICT')->onDelete('CASCADE');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('employees', function(Blueprint $table)
		{
			$table->dropForeign('employees_branch_id_foreign');
			$table->dropForeign('employees_deperment_id_foreign');
			$table->dropForeign('employees_emploment_mode_id_foreign');
			$table->dropForeign('employees_rank_id_foreign');
		});
	}

}
