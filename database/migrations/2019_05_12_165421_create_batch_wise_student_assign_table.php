<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateBatchWiseStudentAssignTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('batch_wise_student_assign', function(Blueprint $table)
		{
			$table->increments('id');
			$table->integer('student_id')->unsigned()->nullable()->unique();
			$table->integer('batch_id')->unsigned()->nullable()->index('batch_wise_student_assign_batch_id_foreign');
			$table->integer('status')->nullable();
			$table->integer('created_by')->unsigned()->nullable();
			$table->integer('updated_by')->unsigned()->nullable();
			$table->timestamps();
			$table->integer('branch_id')->unsigned()->nullable();
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('batch_wise_student_assign');
	}

}
