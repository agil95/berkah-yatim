<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateUserActivationsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('user_activations', function(Blueprint $table)
		{
			$table->bigInteger('Id', true)->unsigned();
			$table->integer('user_id')->nullable();
			$table->string('token')->nullable();
			$table->dateTime('created_at')->nullable();
			$table->boolean('activated')->nullable();
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('user_activations');
	}

}
