<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateBeasiswasTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('beasiswas', function(Blueprint $table)
		{
			$table->increments('id');
			$table->string('nama_penerima', 191);
			$table->text('deskripsi', 65535);
			$table->string('dokumentasi', 191);
			$table->integer('jumlah_persemester');
			$table->integer('jumlah_total')->nullable();
			$table->integer('lama');
			$table->enum('pendidikan', array('S1','D3'));
			$table->enum('status', array('active','inactive'));
			$table->integer('id_mitra')->unsigned()->index('beasiswas_id_mitra_foreign');
			$table->integer('created_by')->unsigned()->index('beasiswas_created_by_foreign');
			$table->string('updated_by', 191)->nullable();
			$table->timestamps();
			$table->string('kampus', 191);
			$table->enum('jkel', array('L','P'));
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
		Schema::drop('beasiswas');
	}

}
