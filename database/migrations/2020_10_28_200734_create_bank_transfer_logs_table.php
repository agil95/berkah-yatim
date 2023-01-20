<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateBankTransferLogsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('bank_transfer_logs', function(Blueprint $table)
		{
			$table->integer('id', true);
			$table->integer('donasi_id')->nullable();
			$table->string('account_number')->nullable();
			$table->string('account_name')->nullable();
			$table->dateTime('date')->nullable();
			$table->string('description')->nullable();
			$table->float('amount', 10, 0)->nullable();
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
		Schema::drop('bank_transfer_logs');
	}

}
