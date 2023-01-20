<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreatePenyaluransTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('penyalurans', function(Blueprint $table)
		{
			$table->increments('id');
			$table->string('name', 191);
			$table->string('dokumentasi', 191)->nullable();
			$table->text('deskripsi', 65535);
			$table->integer('jumlah');
			$table->integer('penyaluran');
			$table->integer('created_by')->unsigned()->nullable()->index('penyalurans_created_by_foreign');
			$table->string('updated_by', 191)->nullable();
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
		Schema::drop('penyalurans');
	}

}
