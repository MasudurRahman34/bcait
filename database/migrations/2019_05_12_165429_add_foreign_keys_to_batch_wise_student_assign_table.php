<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddForeignKeysToBatchWiseStudentAssignTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('batch_wise_student_assign', function(Blueprint $table)
		{
			$table->foreign('batch_id')->references('id')->on('batch')->onUpdate('RESTRICT')->onDelete('CASCADE');
			$table->foreign('student_id')->references('id')->on('students')->onUpdate('RESTRICT')->onDelete('CASCADE');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('batch_wise_student_assign', function(Blueprint $table)
		{
			$table->dropForeign('batch_wise_student_assign_batch_id_foreign');
			$table->dropForeign('batch_wise_student_assign_student_id_foreign');
		});
	}

}
