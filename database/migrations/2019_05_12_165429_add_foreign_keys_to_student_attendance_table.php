<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddForeignKeysToStudentAttendanceTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('student_attendance', function(Blueprint $table)
		{
			$table->foreign('batch_id')->references('id')->on('batch')->onUpdate('RESTRICT')->onDelete('CASCADE');
			$table->foreign('branch_id')->references('id')->on('branch')->onUpdate('RESTRICT')->onDelete('CASCADE');
			$table->foreign('course_id')->references('id')->on('courses')->onUpdate('RESTRICT')->onDelete('CASCADE');
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
		Schema::table('student_attendance', function(Blueprint $table)
		{
			$table->dropForeign('student_attendance_batch_id_foreign');
			$table->dropForeign('student_attendance_branch_id_foreign');
			$table->dropForeign('student_attendance_course_id_foreign');
			$table->dropForeign('student_attendance_student_id_foreign');
		});
	}

}
