<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePatientsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('patients', function($table) {

			# Primary key
			$table->increments('id');

			# Timestamps
			$table->timestamps();

			# Table content
			$table->string('last_name');
			$table->string('first_name');
			$table->integer('birth_date');
			$table->char('gender',1);
			$table->integer('berg_score');
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('patients');
	}

}
