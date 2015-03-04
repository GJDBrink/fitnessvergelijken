<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOpeningHoursTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('opening_hours', function(Blueprint $table)
		{
			$table->increments('id');

			$table->integer('gym_id');
			$table->integer('day');
			$table->string('start', 20);
			$table->string('close', 20);
			$table->boolean('special');
			$table->string('special_name', 30);
			$table->date('date');

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
		Schema::table('opening_hours', function(Blueprint $table)
		{
			//
			Schema::drop('opening_hours');
		});
	}

}
