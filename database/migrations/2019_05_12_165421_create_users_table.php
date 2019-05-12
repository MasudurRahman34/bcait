<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateUsersTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('users', function(Blueprint $table)
		{
			$table->increments('id');
			$table->string('name');
			$table->string('slug')->nullable();
			$table->string('uuid')->nullable();
			$table->string('custom_id')->unique();
			$table->string('email')->unique();
			$table->string('password');
			$table->integer('user_type')->default(0)->comment('0=dev,1=admin,2=user,3=subadmin');
			$table->integer('branch_id')->default(0)->comment('0=default');
			$table->integer('module_id')->default(0)->comment('0=default');
			$table->integer('status')->default(1);
			$table->string('remember_token', 100)->nullable();
			$table->string('hidden');
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
		Schema::drop('users');
	}

}
