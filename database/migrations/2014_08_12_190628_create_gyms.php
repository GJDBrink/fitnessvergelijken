<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateGyms extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		//
		Schema::create('gyms', function($table)
		{
			$table->increments('id');
			
			$table->string('name');
			$table->integer('location_id');
			$table->string('place');
			$table->string('address');
			$table->string('postal');
			$table->string('house_nr');
			$table->integer('user_id');
			$table->integer('category_id');
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
		//
		Schema::drop('gyms');
	}

}
