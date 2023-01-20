<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddForeignKeysToKegiataninfaksTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('kegiataninfaks', function(Blueprint $table)
		{
			$table->foreign('created_by')->references('id')->on('admins')->onUpdate('NO ACTION')->onDelete('NO ACTION');
			$table->foreign('id_mitra', 'kegiataninfaks_ibfk_1')->references('id')->on('mitras')->onUpdate('NO ACTION')->onDelete('CASCADE');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('kegiataninfaks', function(Blueprint $table)
		{
			$table->dropForeign('kegiataninfaks_created_by_foreign');
			$table->dropForeign('kegiataninfaks_ibfk_1');
		});
	}

}
