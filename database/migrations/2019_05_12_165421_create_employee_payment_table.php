<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateEmployeePaymentTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('employee_payment', function(Blueprint $table)
		{
			$table->increments('id');
			$table->date('date')->nullable();
			$table->integer('branch_id')->unsigned()->nullable()->index('employee_payment_branch_id_foreign');
			$table->integer('employee_id')->unsigned()->nullable()->index('employee_payment_employee_id_foreign');
			$table->decimal('prv_sallary')->default(0.00);
			$table->decimal('paid')->default(0.00);
			$table->decimal('due')->default(0.00);
			$table->integer('status')->nullable();
			$table->integer('created_by')->unsigned()->nullable();
			$table->integer('updated_by')->unsigned()->nullable();
			$table->timestamps();
			$table->text('note', 65535)->nullable();
			$table->text('edit_color', 65535)->nullable();
			$table->integer('payment_type')->nullable();
			$table->decimal('credit_balance')->default(0.00);
			$table->decimal('debit_balance')->default(0.00);
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('employee_payment');
	}

}
