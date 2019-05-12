<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddForeignKeysToMenuPermissionsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('menu_permissions', function(Blueprint $table)
		{
			$table->foreign('menu_id')->references('id')->on('menus')->onUpdate('RESTRICT')->onDelete('CASCADE');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('menu_permissions', function(Blueprint $table)
		{
			$table->dropForeign('menu_permissions_menu_id_foreign');
		});
	}

}
