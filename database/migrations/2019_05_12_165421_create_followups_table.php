<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateFollowupsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('followups', function(Blueprint $table)
		{
			$table->increments('id');
			$table->integer('customer_id')->unsigned()->nullable()->index('followups_customer_id_foreign');
			$table->integer('user_id')->unsigned()->nullable()->index('followups_user_id_foreign');
			$table->date('followup_date')->nullable();
			$table->text('comment', 65535)->nullable();
			$table->boolean('status')->nullable()->default(1);
			$table->integer('created_by')->unsigned()->nullable();
			$table->integer('updated_by')->unsigned()->nullable();
			$table->timestamps();
			$table->integer('branch_id')->unsigned()->nullable()->index('followups_branch_id_foreign');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('followups');
	}

}
