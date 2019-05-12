<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateCustomerCallRecordsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('customer_call_records', function(Blueprint $table)
		{
			$table->increments('id');
			$table->integer('customer_id')->unsigned()->nullable()->index('customer_call_records_customer_id_foreign');
			$table->date('date');
			$table->string('caller_name');
			$table->string('call_receive_status')->nullable();
			$table->integer('admission_status')->nullable();
			$table->string('cancellation_reason')->nullable();
			$table->date('next_date')->nullable();
			$table->text('comment', 65535)->nullable();
			$table->boolean('status')->nullable()->default(1);
			$table->integer('created_by')->unsigned()->nullable();
			$table->integer('updated_by')->unsigned()->nullable();
			$table->timestamps();
			$table->integer('branch_id')->unsigned()->nullable()->index('customer_call_records_branch_id_foreign');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('customer_call_records');
	}

}
