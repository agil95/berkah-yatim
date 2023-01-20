<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateMenuTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('menu', function(Blueprint $table)
		{
			$table->integer('id', true);
			$table->string('name', 30)->unique('name');
			$table->integer('parent_id')->unsigned()->nullable();
			$table->string('url', 100)->nullable();
			$table->string('icon', 50)->nullable()->default('fa fa-circle-o');
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
		Schema::drop('menu');
	}

}
