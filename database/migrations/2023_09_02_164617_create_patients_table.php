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
			$table->string('phone_one')->nullable();
			$table->string('phone_two')->nullable();
			$table->string('email')->nullable();
			$table->string('request_photo')->nullable();
		});
	}

	public function down()
	{
		Schema::drop('patients');
	}
}