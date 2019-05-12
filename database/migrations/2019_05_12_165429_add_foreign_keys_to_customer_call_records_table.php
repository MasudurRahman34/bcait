<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddForeignKeysToCustomerCallRecordsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('customer_call_records', function(Blueprint $table)
		{
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
		Schema::table('customer_call_records', function(Blueprint $table)
		{
			$table->dropForeign('customer_call_records_branch_id_foreign');
			$table->dropForeign('customer_call_records_customer_id_foreign');
		});
	}

}
