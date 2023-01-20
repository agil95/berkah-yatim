<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateUkmsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('ukms', function(Blueprint $table)
		{
			$table->increments('id');
			$table->string('nama_penerima', 191);
			$table->string('nama_usaha', 191);
			$table->text('deskripsi', 65535);
			$table->integer('jumlah_awal');
			$table->integer('jumlah_total')->nullable();
			$table->string('dokumentasi', 191);
			$table->enum('status', array('active','inactive'));
			$table->integer('lama');
			$table->integer('created_by')->unsigned()->index('ukms_created_by_foreign');
			$table->string('updated_by', 191)->nullable();
			$table->timestamps();
			$table->string('roles', 191);
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('ukms');
	}

}
