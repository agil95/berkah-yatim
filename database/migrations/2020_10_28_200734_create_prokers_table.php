<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateProkersTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('prokers', function(Blueprint $table)
		{
			$table->increments('id');
			$table->string('nama_kegiatan', 191);
			$table->string('tag', 200);
			$table->text('deskripsi', 65535);
			$table->integer('created_by')->unsigned()->index('prokers_created_by_foreign');
			$table->timestamps();
			$table->string('dokumentasi', 191)->nullable();
			$table->decimal('target', 10, 0);
			$table->integer('urutan')->unsigned()->nullable();
			$table->dateTime('target_date')->nullable();
			$table->integer('fundriser_id');
			$table->integer('left_day')->nullable()->default(0);
			$table->decimal('actual_earn', 10, 0)->default(0);
			$table->integer('is_pilihan')->default(0);
			$table->boolean('is_urgent')->default(0);
			$table->string('type', 50)->nullable();
			$table->string('url', 250)->nullable();
			$table->softDeletes();
			$table->boolean('status')->default(1);
			$table->text('note', 65535)->nullable();
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('prokers');
	}

}
