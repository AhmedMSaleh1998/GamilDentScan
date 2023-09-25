<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreatePatientsTable extends Migration {

	public function up()
	{
		Schema::create('patients', function(Blueprint $table) {
			$table->increments('id');
			$table->timestamps();
			$table->string('name', 255);
			$table->date('birth_date');
			$table->string('address', 255)->nullable();
			$table->string('phone_one', 255)->nullable();
			$table->string('phone_two', 255)->nullable();
			$table->string('email')->nullable();
		});
	}

	public function down()
	{
		Schema::drop('patients');
	}
}