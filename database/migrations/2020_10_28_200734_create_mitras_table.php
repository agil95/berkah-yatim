<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateMitrasTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('mitras', function(Blueprint $table)
		{
			$table->increments('id');
			$table->string('nama', 191);
			$table->string('alamat', 191);
			$table->string('email', 191);
			$table->integer('jumlah');
			$table->integer('created_by')->unsigned()->index('mitras_created_by_foreign');
			$table->string('updated_by', 191)->nullable();
			$table->timestamps();
			$table->integer('is_verified')->default(1);
			$table->string('logo', 200);
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('mitras');
	}

}
