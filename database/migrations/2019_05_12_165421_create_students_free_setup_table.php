<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateStudentsFreeSetupTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('students_free_setup', function(Blueprint $table)
		{
			$table->increments('id');
			$table->integer('student_id')->unsigned()->nullable()->index('students_free_setup_student_id_foreign');
			$table->text('service_info', 65535)->nullable()->comment('service info');
			$table->decimal('total')->nullable();
			$table->date('setup_date')->nullable();
			$table->integer('status')->nullable();
			$table->integer('created_by')->unsigned()->nullable();
			$table->integer('updated_by')->unsigned()->nullable();
			$table->timestamps();
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('students_free_setup');
	}

}
