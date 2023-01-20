<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateRekeningsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('rekenings', function(Blueprint $table)
		{
			$table->increments('id');
			$table->string('tipe', 50);
			$table->string('bank', 191)->index('bank_2');
			$table->string('account', 200)->unique('account');
			$table->string('dokumentasi', 191);
			$table->boolean('status')->default(1);
			$table->integer('created_by')->unsigned()->index('beasiswas_created_by_foreign');
			$table->string('updated_by', 191)->nullable();
			$table->timestamps();
			$table->string('owner', 200);
			$table->string('branch', 200);
			$table->string('moota_id', 16)->nullable();
			$table->string('judul_panduan_pembayaran1', 150)->nullable();
			$table->text('panduan_pembayaran1', 65535)->nullable();
			$table->string('judul_panduan_pembayaran2', 150)->nullable();
			$table->text('panduan_pembayaran2', 65535)->nullable();
			$table->string('judul_panduan_pembayaran3', 150)->nullable();
			$table->text('panduan_pembayaran3', 65535)->nullable();
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('rekenings');
	}

}
