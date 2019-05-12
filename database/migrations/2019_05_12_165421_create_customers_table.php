<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateCustomersTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('customers', function(Blueprint $table)
		{
			$table->increments('id');
			$table->integer('course_id')->unsigned()->nullable()->index('customers_course_id_foreign');
			$table->string('name');
			$table->string('mobile_number');
			$table->string('duplicate')->nullable();
			$table->string('email');
			$table->string('designation');
			$table->string('org_name')->nullable();
			$table->boolean('lead_type')->nullable();
			$table->boolean('call_isdl')->nullable();
			$table->boolean('call_status')->nullable();
			$table->boolean('admission_status')->nullable();
			$table->string('agent_status')->nullable();
			$table->integer('agent_id')->unsigned()->nullable();
			$table->text('conversion', 65535)->nullable();
			$table->string('preferred_time')->nullable();
			$table->string('preferred_date')->nullable();
			$table->date('next_followup')->nullable();
			$table->text('comment', 65535)->nullable();
			$table->boolean('status')->nullable()->default(1);
			$table->integer('created_by')->unsigned()->nullable();
			$table->integer('updated_by')->unsigned()->nullable();
			$table->timestamps();
			$table->integer('branch_id')->unsigned()->nullable()->index('customers_branch_id_foreign');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('customers');
	}

}
