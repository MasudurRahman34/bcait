<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddForeignKeysToLeadsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('leads', function(Blueprint $table)
		{
			$table->foreign('agent_id')->references('id')->on('users')->onUpdate('RESTRICT')->onDelete('CASCADE');
			$table->foreign('branch_id')->references('id')->on('branch')->onUpdate('RESTRICT')->onDelete('CASCADE');
			$table->foreign('customer_id')->references('id')->on('customers')->onUpdate('RESTRICT')->onDelete('CASCADE');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('leads', function(Blueprint $table)
		{
			$table->dropForeign('leads_agent_id_foreign');
			$table->dropForeign('leads_branch_id_foreign');
			$table->dropForeign('leads_customer_id_foreign');
		});
	}

}
