<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddForeignKeysToSubMenusTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('sub_menus', function(Blueprint $table)
		{
			$table->foreign('menu_id')->references('id')->on('menus')->onUpdate('RESTRICT')->onDelete('CASCADE');
			$table->foreign('module_id')->references('id')->on('modules')->onUpdate('RESTRICT')->onDelete('CASCADE');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('sub_menus', function(Blueprint $table)
		{
			$table->dropForeign('sub_menus_menu_id_foreign');
			$table->dropForeign('sub_menus_module_id_foreign');
		});
	}

}
