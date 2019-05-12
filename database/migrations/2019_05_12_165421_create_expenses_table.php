<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateExpensesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('expenses', function(Blueprint $table)
		{
			$table->increments('id');
			$table->date('date')->nullable();
			$table->integer('head_id')->unsigned()->nullable()->index('expenses_head_id_foreign');
			$table->decimal('total')->default(0.00);
			$table->text('note', 65535)->nullable();
			$table->string('payee')->nullable();
			$table->integer('category_id')->unsigned()->nullable()->index('expenses_category_id_foreign');
			$table->integer('branch_id')->unsigned()->nullable()->index('expenses_branch_id_foreign');
			$table->string('bill_no')->nullable();
			$table->integer('expense_type')->nullable();
			$table->string('edit_color')->nullable();
			$table->integer('action_id')->nullable();
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
		Schema::drop('expenses');
	}

}
