<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateStudentsFeesCollectionTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('students_fees_collection', function(Blueprint $table)
		{
			$table->increments('id');
			$table->integer('invoice_id')->unsigned()->nullable();
			$table->integer('student_id')->unsigned()->nullable()->index('students_payments_student_id_foreign');
			$table->date('date')->nullable();
			$table->decimal('paid')->nullable();
			$table->integer('month_id')->nullable();
			$table->integer('branch_id')->unsigned()->nullable()->index('students_payments_branch_id_foreign');
			$table->integer('status')->nullable();
			$table->integer('created_by')->unsigned()->nullable();
			$table->integer('updated_by')->unsigned()->nullable();
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
		Schema::drop('students_fees_collection');
	}

}
