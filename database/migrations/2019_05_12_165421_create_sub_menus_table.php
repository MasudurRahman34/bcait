<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateSubMenusTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('sub_menus', function(Blueprint $table)
		{
			$table->increments('id');
			$table->integer('menu_id')->unsigned()->nullable()->index('sub_menus_menu_id_foreign');
			$table->integer('module_id')->unsigned()->nullable()->index('sub_menus_module_id_foreign');
			$table->string('name')->nullable();
			$table->string('route')->nullable();
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
		Schema::drop('sub_menus');
	}

}
