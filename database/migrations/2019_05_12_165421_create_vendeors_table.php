<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateVendeorsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('vendeors', function(Blueprint $table)
		{
			$table->increments('id');
			$table->string('first_name')->nullable();
			$table->string('middel_name')->nullable();
			$table->string('last_name')->nullable();
			$table->string('company_name')->nullable();
			$table->text('address', 65535)->nullable();
			$table->text('notes', 65535)->nullable();
			$table->string('email')->nullable();
			$table->integer('mobile_no')->nullable();
			$table->integer('office_phone')->nullable();
			$table->string('web_site')->nullable();
			$table->string('billing_rate')->nullable();
			$table->text('terms', 65535)->nullable();
			$table->decimal('opening_blance')->default(0.00);
			$table->integer('bank_account_no')->nullable();
			$table->integer('tade_licence_no')->nullable();
			$table->string('quality_rating')->nullable();
			$table->date('as_of_the_date')->nullable();
			$table->integer('course_id')->unsigned()->nullable()->index('vendeors_course_id_foreign');
			$table->integer('designation_id')->unsigned()->nullable()->index('vendeors_designation_id_foreign');
			$table->integer('branch_id')->unsigned()->nullable()->index('vendeors_branch_id_foreign');
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
		Schema::drop('vendeors');
	}

}
