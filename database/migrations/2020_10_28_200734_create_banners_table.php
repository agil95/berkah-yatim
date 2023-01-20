<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateBannersTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('banners', function(Blueprint $table)
		{
			$table->increments('id');
			$table->string('nama', 191);
			$table->string('link', 200);
			$table->string('dokumentasi', 191);
			$table->enum('status', array('active','inactive'));
			$table->integer('created_by')->unsigned()->index('beasiswas_created_by_foreign');
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
		Schema::drop('banners');
	}

}
