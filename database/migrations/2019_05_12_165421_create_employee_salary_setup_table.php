<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateEmployeeSalarySetupTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('employee_salary_setup', function(Blueprint $table)
		{
			$table->increments('id');
			$table->integer('branch_id')->unsigned()->nullable()->index('employee_salary_setup_branch_id_foreign');
			$table->integer('employee_id')->unsigned()->nullable()->index('employee_salary_setup_employee_id_foreign');
			$table->date('date')->nullable();
			$table->decimal('fixed_sallary')->default(0.00);
			$table->decimal('advancead')->default(0.00);
			$table->decimal('bonus')->default(0.00);
			$table->decimal('absande_fine')->default(0.00);
			$table->decimal('payable_salary')->default(0.00);
			$table->integer('status')->nullable();
			$table->integer('created_by')->unsigned()->nullable();
			$table->integer('updated_by')->unsigned()->nullable();
			$table->timestamps();
			$table->text('note', 65535)->nullable();
			$table->string('month')->nullable();
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('employee_salary_setup');
	}

}
