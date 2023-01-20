<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateKegiataninfaksTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('kegiataninfaks', function(Blueprint $table)
		{
			$table->increments('id');
			$table->string('judul', 200);
			$table->integer('id_mitra')->unsigned()->index('id_mitra');
			$table->text('deskripsi', 65535);
			$table->integer('jumlah');
			$table->integer('created_by')->unsigned()->index('kegiataninfaks_created_by_foreign');
			$table->string('updated_by', 191)->nullable();
			$table->string('dokumentasi', 191);
			$table->timestamps();
			$table->string('roles', 191);
			$table->integer('jumlah_real');
			$table->integer('day_left');
			$table->integer('day');
			$table->integer('status');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('kegiataninfaks');
	}

}
