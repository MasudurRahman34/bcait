<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateCourseAssignToTeacherTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('course_assign_to_teacher', function(Blueprint $table)
		{
			$table->increments('id');
			$table->integer('course_id')->unsigned()->nullable()->index('course_assign_to_teacher_course_id_foreign');
			$table->integer('employe_id')->unsigned()->nullable()->index('course_assign_to_teacher_employe_id_foreign');
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
		Schema::drop('course_assign_to_teacher');
	}

}
