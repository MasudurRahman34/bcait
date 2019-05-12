<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateMenuPermissionsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('menu_permissions', function(Blueprint $table)
		{
			$table->increments('id');
			$table->integer('menu_id')->unsigned()->nullable()->index('menu_permissions_menu_id_foreign');
			$table->string('name')->nullable();
			$table->text('route')->nullable();
			$table->integer('view_order')->unsigned()->nullable();
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
		Schema::drop('menu_permissions');
	}

}
