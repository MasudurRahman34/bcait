<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddForeignKeysToExamSetupTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('exam_setup', function(Blueprint $table)
		{
			$table->foreign('batch_id')->references('id')->on('batch')->onUpdate('RESTRICT')->onDelete('CASCADE');
			$table->foreign('branch_id')->references('id')->on('branch')->onUpdate('RESTRICT')->onDelete('CASCADE');
			$table->foreign('course_id')->references('id')->on('courses')->onUpdate('RESTRICT')->onDelete('CASCADE');
			$table->foreign('exam_group_id')->references('id')->on('exam_groups')->onUpdate('RESTRICT')->onDelete('CASCADE');
			$table->foreign('exam_type_id')->references('id')->on('exam_types')->onUpdate('RESTRICT')->onDelete('CASCADE');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('exam_setup', function(Blueprint $table)
		{
			$table->dropForeign('exam_setup_batch_id_foreign');
			$table->dropForeign('exam_setup_branch_id_foreign');
			$table->dropForeign('exam_setup_course_id_foreign');
			$table->dropForeign('exam_setup_exam_group_id_foreign');
			$table->dropForeign('exam_setup_exam_type_id_foreign');
		});
	}

}
