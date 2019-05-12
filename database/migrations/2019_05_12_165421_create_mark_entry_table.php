<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateMarkEntryTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('mark_entry', function(Blueprint $table)
		{
			$table->increments('id');
			$table->integer('student_id')->unsigned()->nullable()->index('mark_entry_student_id_foreign');
			$table->integer('exam_id')->unsigned()->nullable()->index('mark_entry_exam_id_foreign');
			$table->integer('course_id')->unsigned()->nullable()->index('mark_entry_course_id_foreign');
			$table->integer('batch_id')->unsigned()->nullable()->index('mark_entry_batch_id_foreign');
			$table->integer('required_mark')->nullable();
			$table->integer('mark')->nullable();
			$table->string('comment')->nullable();
			$table->integer('created_by')->unsigned()->nullable();
			$table->integer('updated_by')->unsigned()->nullable();
			$table->timestamps();
			$table->integer('branch_id')->unsigned()->nullable()->index('mark_entry_branch_id_foreign');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('mark_entry');
	}

}
