<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateRecivedTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('recived', function(Blueprint $table)
		{
			$table->increments('id');
			$table->date('date')->nullable();
			$table->string('bill_no')->nullable();
			$table->integer('recived_head_id')->unsigned()->nullable()->index('recived_recived_head_id_foreign');
			$table->decimal('amount')->nullable()->default(0.00);
			$table->string('action')->nullable();
			$table->string('note')->nullable();
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
		Schema::drop('recived');
	}

}
