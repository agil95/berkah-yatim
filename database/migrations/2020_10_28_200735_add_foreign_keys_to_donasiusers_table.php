<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddForeignKeysToDonasiusersTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('donasiusers', function(Blueprint $table)
		{
			$table->foreign('confirm_by')->references('id')->on('admins')->onUpdate('NO ACTION')->onDelete('NO ACTION');
			$table->foreign('iduser')->references('id')->on('users')->onUpdate('NO ACTION')->onDelete('NO ACTION');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('donasiusers', function(Blueprint $table)
		{
			$table->dropForeign('donasiusers_confirm_by_foreign');
			$table->dropForeign('donasiusers_iduser_foreign');
		});
	}

}
