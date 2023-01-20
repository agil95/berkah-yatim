<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddForeignKeysToBeasiswasTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('beasiswas', function(Blueprint $table)
		{
			$table->foreign('created_by')->references('id')->on('admins')->onUpdate('NO ACTION')->onDelete('NO ACTION');
			$table->foreign('id_mitra')->references('id')->on('mitras')->onUpdate('NO ACTION')->onDelete('NO ACTION');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('beasiswas', function(Blueprint $table)
		{
			$table->dropForeign('beasiswas_created_by_foreign');
			$table->dropForeign('beasiswas_id_mitra_foreign');
		});
	}

}
