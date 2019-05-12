<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateBankLadgerTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('bank_ladger', function(Blueprint $table)
		{
			$table->increments('id');
			$table->integer('bank_id')->unsigned()->nullable()->index('bank_ladger_bank_id_foreign');
			$table->decimal('amount')->default(0.00);
			$table->date('date')->nullable();
			$table->string('ladger_title')->nullable();
			$table->text('note', 65535)->nullable();
			$table->string('ladger_type')->nullable()->comment('income expense');
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
		Schema::drop('bank_ladger');
	}

}
