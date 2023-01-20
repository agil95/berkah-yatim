<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddForeignKeysToDonasisTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('donasis', function(Blueprint $table)
		{
			$table->foreign('confirm_by')->references('id')->on('admins')->onUpdate('NO ACTION')->onDelete('NO ACTION');
			$table->foreign('campaign_id', 'donasis_ibfk_1')->references('id')->on('prokers')->onUpdate('NO ACTION')->onDelete('NO ACTION');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('donasis', function(Blueprint $table)
		{
			$table->dropForeign('donasis_confirm_by_foreign');
			$table->dropForeign('donasis_ibfk_1');
		});
	}

}
