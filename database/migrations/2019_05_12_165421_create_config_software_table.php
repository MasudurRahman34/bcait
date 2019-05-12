<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateConfigSoftwareTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('config_software', function(Blueprint $table)
		{
			$table->integer('id')->default(1);
			$table->string('name')->nullable();
			$table->string('title')->nullable();
			$table->string('contact')->nullable();
			$table->string('address')->nullable();
			$table->string('email')->nullable();
			$table->string('web')->nullable();
			$table->string('admin_name')->nullable();
			$table->string('admin_contact')->nullable();
			$table->string('admin_designation')->nullable();
			$table->string('logo')->nullable();
			$table->string('currency')->nullable();
			$table->string('currency_code')->nullable();
			$table->text('module_id', 65535)->nullable();
			$table->integer('created_by')->unsigned()->nullable();
			$table->integer('updated_by')->unsigned()->nullable();
			$table->timestamps();
			$table->text('app_key', 65535)->nullable();
			$table->text('api_key', 65535)->nullable();
			$table->date('app_exp_date')->nullable();
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('config_software');
	}

}
