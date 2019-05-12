<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddForeignKeysToMarkEntryTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('mark_entry', function(Blueprint $table)
		{
			$table->foreign('batch_id')->references('id')->on('batch')->onUpdate('RESTRICT')->onDelete('CASCADE');
			$table->foreign('branch_id')->references('id')->on('branch')->onUpdate('RESTRICT')->onDelete('CASCADE');
			$table->foreign('course_id')->references('id')->on('courses')->onUpdate('RESTRICT')->onDelete('CASCADE');
			$table->foreign('exam_id')->references('id')->on('exam_setup')->onUpdate('RESTRICT')->onDelete('CASCADE');
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
		Schema::table('mark_entry', function(Blueprint $table)
		{
			$table->dropForeign('mark_entry_batch_id_foreign');
			$table->dropForeign('mark_entry_branch_id_foreign');
			$table->dropForeign('mark_entry_course_id_foreign');
			$table->dropForeign('mark_entry_exam_id_foreign');
			$table->dropForeign('mark_entry_student_id_foreign');
		});
	}

}
