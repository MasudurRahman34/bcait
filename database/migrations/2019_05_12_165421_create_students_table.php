<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateStudentsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('students', function(Blueprint $table)
		{
			$table->increments('id');
			$table->string('student_id', 11)->nullable();
			$table->integer('course_id')->unsigned()->nullable()->index('students_course_id_foreign');
			$table->string('first_name');
			$table->string('last_name');
			$table->string('mobile_number')->nullable();
			$table->string('email')->nullable();
			$table->string('gender')->nullable();
			$table->string('religion')->nullable();
			$table->string('present_address')->nullable();
			$table->string('permanent_address')->nullable();
			$table->string('post_code')->nullable();
			$table->string('contact_number')->nullable();
			$table->boolean('status')->nullable()->default(1);
			$table->string('image')->nullable();
			$table->integer('created_by')->unsigned()->nullable();
			$table->integer('updated_by')->unsigned()->nullable();
			$table->timestamps();
			$table->string('father_name')->nullable();
			$table->string('mother_name')->nullable();
			$table->string('national_id')->nullable();
			$table->string('organization')->nullable();
			$table->integer('branch_id')->unsigned()->nullable()->index('students_branch_id_foreign');
			$table->integer('batch_id')->unsigned()->nullable();
			$table->decimal('amount', 10)->nullable();
			$table->decimal('monthly_fee', 10, 0)->nullable();
			$table->integer('monthly_due_fee')->nullable();
			$table->integer('month_id')->nullable();
			$table->boolean('month_status')->nullable()->default(0);
			$table->decimal('discount', 10, 0)->nullable();
			$table->decimal('due', 10)->nullable();
			$table->date('next_pad_date')->nullable();
			$table->date('date_of_birth')->nullable();
			$table->string('bcs_exam_type')->nullable();
			$table->string('roll_number')->nullable();
			$table->integer('applicants_id')->unsigned()->nullable();
			$table->integer('user_id')->unsigned()->nullable()->index('students_user_id_foreign');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('students');
	}

}
