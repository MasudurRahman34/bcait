<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddForeignKeysToCourseAssignToTeacherTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('course_assign_to_teacher', function(Blueprint $table)
		{
			$table->foreign('course_id')->references('id')->on('batch')->onUpdate('RESTRICT')->onDelete('CASCADE');
			$table->foreign('employe_id')->references('id')->on('employees')->onUpdate('RESTRICT')->onDelete('CASCADE');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('course_assign_to_teacher', function(Blueprint $table)
		{
			$table->dropForeign('course_assign_to_teacher_course_id_foreign');
			$table->dropForeign('course_assign_to_teacher_employe_id_foreign');
		});
	}

}
