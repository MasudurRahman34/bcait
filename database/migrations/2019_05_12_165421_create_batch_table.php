<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateBatchTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('batch', function(Blueprint $table)
		{
			$table->increments('id');
			$table->integer('course_id')->unsigned()->nullable()->index('batch_course_id_foreign');
			$table->string('batch_name')->nullable();
			$table->integer('limit')->nullable()->comment('number of set plan');
			$table->string('code')->nullable();
			$table->text('class_schedule', 65535)->nullable();
			$table->integer('status')->nullable();
			$table->integer('number_of_exam_test')->nullable();
			$table->integer('number_of_mid_test')->nullable();
			$table->integer('created_by')->unsigned()->nullable();
			$table->integer('updated_by')->unsigned()->nullable();
			$table->timestamps();
			$table->date('start_date')->nullable();
			$table->date('end_date')->nullable();
			$table->integer('branch_id')->unsigned()->nullable()->index('batch_branch_id_foreign');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('batch');
	}

}
