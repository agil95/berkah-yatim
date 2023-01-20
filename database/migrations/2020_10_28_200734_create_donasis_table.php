<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateDonasisTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('donasis', function(Blueprint $table)
		{
			$table->increments('id');
			$table->string('nama', 191)->nullable();
			$table->string('email', 191)->nullable();
			$table->string('nohp', 191);
			$table->integer('confirm_by')->unsigned()->nullable()->index('donasis_confirm_by_foreign');
			$table->string('status', 150);
			$table->float('jumlah', 10, 0);
			$table->string('foto', 191)->nullable();
			$table->timestamps();
			$table->dateTime('expired_at')->nullable();
			$table->integer('mitra_id')->nullable();
			$table->integer('campaign_id')->unsigned()->nullable()->index('campaign_id');
			$table->string('campaign_type')->nullable();
			$table->string('type', 50)->nullable();
			$table->string('invoice', 150)->nullable()->unique('invoice');
			$table->string('url', 150)->nullable();
			$table->text('snap_token', 65535)->nullable();
			$table->text('message', 65535)->nullable();
			$table->string('ref', 250)->nullable();
			$table->integer('fundriser')->unsigned()->nullable()->index('fundriser');
			$table->integer('unique_code')->unsigned()->nullable();
			$table->integer('reff_id')->unsigned()->nullable();
			$table->string('bank_reff_id', 50)->nullable();
			$table->string('no_rekening', 150)->nullable();
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('donasis');
	}

}
