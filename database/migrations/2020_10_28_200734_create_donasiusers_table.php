<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateDonasiusersTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('donasiusers', function(Blueprint $table)
		{
			$table->increments('id');
			$table->integer('jumlah')->unsigned()->nullable();
			$table->string('status', 25)->nullable();
			$table->integer('iduser')->unsigned()->nullable()->index('donasiusers_iduser_foreign');
			$table->integer('campaign_id')->unsigned()->nullable()->index('campaign_id');
			$table->integer('confirm_by')->unsigned()->nullable()->index('donasiusers_confirm_by_foreign');
			$table->timestamps();
			$table->string('ref', 100)->nullable();
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('donasiusers');
	}

}
