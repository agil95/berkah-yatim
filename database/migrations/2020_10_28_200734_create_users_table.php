<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateUsersTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('users', function(Blueprint $table)
		{
			$table->increments('id');
			$table->string('name', 191);
			$table->date('birth_date')->nullable();
			$table->string('email', 191)->unique();
			$table->dateTime('email_verified_at')->nullable();
			$table->string('activated', 150)->nullable();
			$table->string('password', 191);
			$table->string('remember_token', 100)->nullable();
			$table->timestamps();
			$table->integer('totaldonasi')->nullable();
			$table->string('nohp', 191)->nullable();
			$table->string('foto', 191)->nullable();
			$table->string('alamat', 191)->nullable();
			$table->string('status', 25)->default('inactive');
			$table->integer('deleted_by')->unsigned()->nullable()->index('users_deleted_by_foreign');
			$table->integer('donasi_awal')->default(0);
			$table->enum('jkel', array('L','P'))->nullable();
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('users');
	}

}
