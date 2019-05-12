<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreatePayablesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('payables', function(Blueprint $table)
		{
			$table->integer('id', true);
			$table->date('date')->nullable();
			$table->string('payable_term')->nullable();
			$table->integer('student_id')->nullable();
			$table->decimal('amount')->nullable();
			$table->boolean('status')->default(1);
			$table->timestamps();
			$table->integer('created_by');
			$table->integer('updated_by');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('payables');
	}

}
