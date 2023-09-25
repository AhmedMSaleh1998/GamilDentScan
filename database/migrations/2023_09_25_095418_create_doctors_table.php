<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateDoctorsTable extends Migration {

	public function up()
	{
		Schema::create('doctors', function(Blueprint $table) {
			$table->increments('id');
			$table->timestamps();
			$table->string('name', 255)->nullable();
			$table->string('phone')->nullable();
			$table->string('email')->nullable();
		});
	}

	public function down()
	{
		Schema::drop('doctors');
	}
}