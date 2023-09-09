<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateTechniciansTable extends Migration {

	public function up()
	{
		Schema::create('technicians', function(Blueprint $table) {
			$table->increments('id');
			$table->timestamps();
			$table->softDeletes();
			$table->string('name', 255);
			$table->string('phone');
			$table->string('address')->nullable();
			$table->string('fixed_salary', 255);
			$table->string('email')->nullable();
		});
	}

	public function down()
	{
		Schema::drop('technicians');
	}
}