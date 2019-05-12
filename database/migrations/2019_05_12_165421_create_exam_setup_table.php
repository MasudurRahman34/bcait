<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateExamSetupTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('exam_setup', function(Blueprint $table)
		{
			$table->increments('id');
			$table->date('start_date')->nullable();
			$table->integer('batch_id')->unsigned()->nullable()->index('exam_setup_batch_id_foreign');
			$table->integer('course_id')->unsigned()->nullable()->index('exam_setup_course_id_foreign');
			$table->string('subject')->nullable();
			$table->integer('exam_group_id')->unsigned()->nullable()->index('exam_setup_exam_group_id_foreign');
			$table->integer('exam_type_id')->unsigned()->nullable()->index('exam_setup_exam_type_id_foreign');
			$table->string('exam_name')->nullable();
			$table->integer('required_mark')->nullable();
			$table->integer('status')->nullable();
			$table->integer('created_by')->unsigned()->nullable();
			$table->integer('updated_by')->unsigned()->nullable();
			$table->timestamps();
			$table->integer('branch_id')->unsigned()->nullable()->index('exam_setup_branch_id_foreign');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('exam_setup');
	}

}
