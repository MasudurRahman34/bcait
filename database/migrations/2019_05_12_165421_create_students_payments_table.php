<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateStudentsPaymentsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('students_payments', function(Blueprint $table)
		{
			$table->increments('id');
			$table->integer('student_id')->unsigned()->nullable()->index('students_payments_student_id_foreign');
			$table->date('date')->nullable();
			$table->text('pament_details', 65535)->nullable()->comment('free name and ammount');
			$table->text('note', 65535)->nullable();
			$table->decimal('total')->nullable();
			$table->decimal('paid')->nullable();
			$table->decimal('due')->nullable();
			$table->integer('month_id')->nullable();
			$table->boolean('month_status')->nullable()->default(0);
			$table->decimal('discount', 10, 0)->nullable();
			$table->decimal('monthly_fee', 10, 0)->nullable();
			$table->decimal('monthly_due_fee', 10, 0)->nullable();
			$table->integer('service_id')->nullable();
			$table->integer('branch_id')->unsigned()->nullable()->index('students_payments_branch_id_foreign');
			$table->integer('status')->nullable();
			$table->integer('created_by')->unsigned()->nullable();
			$table->integer('updated_by')->unsigned()->nullable();
			$table->timestamps();
			$table->integer('have_service')->nullable();
			$table->date('next_paid_due')->nullable();
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('students_payments');
	}

}
