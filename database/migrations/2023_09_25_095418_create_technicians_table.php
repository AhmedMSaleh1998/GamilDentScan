<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateTechniciansTable extends Migration {

	public function up()
	{
		Schema::create('technicians', function(Blueprint $table) {
			$table->increments('id');
			$table->timestamps();
			$table->string('name', 255)->nullable();
			$table->string('phone')->nullable();
			$table->string('address')->nullable();
			$table->string('fixed_salary', 255)->nullable();
			$table->string('email')->nullable();
		});
	}

	public function down()
	{
		Schema::drop('technicians');
	}
}