<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddForeignKeysToPenyaluransTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('penyalurans', function(Blueprint $table)
		{
			$table->foreign('created_by')->references('id')->on('admins')->onUpdate('NO ACTION')->onDelete('NO ACTION');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('penyalurans', function(Blueprint $table)
		{
			$table->dropForeign('penyalurans_created_by_foreign');
		});
	}

}
