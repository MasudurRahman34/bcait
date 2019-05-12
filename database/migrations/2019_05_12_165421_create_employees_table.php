<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateEmployeesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('employees', function(Blueprint $table)
		{
			$table->increments('id');
			$table->integer('employee_id')->nullable();
			$table->string('first_name');
			$table->string('middel_name')->nullable();
			$table->string('last_name');
			$table->integer('gender')->nullable();
			$table->integer('emploment_mode_id')->unsigned()->nullable()->index('employees_emploment_mode_id_foreign');
			$table->integer('branch_id')->unsigned()->nullable()->index('employees_branch_id_foreign');
			$table->integer('rank_id')->unsigned()->nullable()->index('employees_rank_id_foreign');
			$table->integer('deperment_id')->unsigned()->nullable()->index('employees_deperment_id_foreign');
			$table->text('notes', 65535)->nullable();
			$table->date('relesed_date')->nullable();
			$table->date('date_of_birth')->nullable();
			$table->string('mobile_number');
			$table->string('email');
			$table->date('join_date')->nullable();
			$table->integer('designation_id')->unsigned()->nullable();
			$table->string('present_address')->nullable();
			$table->string('permanent_address')->nullable();
			$table->string('post_code')->nullable();
			$table->boolean('salary_type')->nullable();
			$table->decimal('basic_salary')->nullable();
			$table->decimal('credit_balance')->nullable();
			$table->decimal('debit_balance')->nullable();
			$table->string('image')->nullable();
			$table->boolean('status')->nullable()->default(1);
			$table->integer('created_by')->unsigned()->nullable();
			$table->integer('updated_by')->unsigned()->nullable();
			$table->timestamps();
			$table->integer('user_id')->unsigned()->nullable();
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('employees');
	}

}
