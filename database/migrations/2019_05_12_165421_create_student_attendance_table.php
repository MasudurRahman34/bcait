<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateStudentAttendanceTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('student_attendance', function(Blueprint $table)
		{
			$table->integer('student_id')->unsigned();
			$table->integer('course_id')->unsigned()->index('student_attendance_course_id_foreign');
			$table->integer('batch_id')->unsigned()->nullable()->index('student_attendance_batch_id_foreign');
			$table->time('in_time')->nullable();
			$table->time('out_time')->nullable();
			$table->date('date');
			$table->integer('status')->nullable();
			$table->integer('created_by')->unsigned()->nullable();
			$table->integer('updated_by')->unsigned()->nullable();
			$table->timestamps();
			$table->integer('branch_id')->unsigned()->nullable()->index('student_attendance_branch_id_foreign');
			$table->primary(['student_id','course_id','date']);
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('student_attendance');
	}

}
