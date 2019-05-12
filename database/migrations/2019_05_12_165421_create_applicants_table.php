<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateApplicantsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('applicants', function(Blueprint $table)
		{
			$table->increments('id');
			$table->integer('course_id')->unsigned()->nullable()->index('applicants_course_id_foreign');
			$table->string('name');
			$table->string('mobile_number');
			$table->string('email');
			$table->boolean('lead_type')->nullable();
			$table->boolean('status')->nullable()->default(0);
			$table->date('date')->nullable();
			$table->integer('ref_for_agent_id')->unsigned()->nullable();
			$table->boolean('is_admission')->nullable();
			$table->integer('created_by')->unsigned()->nullable();
			$table->integer('updated_by')->unsigned()->nullable();
			$table->timestamps();
			$table->integer('branch_id')->unsigned()->nullable()->index('applicants_branch_id_foreign');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('applicants');
	}

}
