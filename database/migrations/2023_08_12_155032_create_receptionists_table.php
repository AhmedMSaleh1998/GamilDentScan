<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateReceptionistsTable extends Migration {

	public function up()
	{
		Schema::create('receptionists', function(Blueprint $table) {
			$table->increments('id');
			$table->timestamps();
			$table->softDeletes();
			$table->string('name', 255);
			$table->string('phone');
			$table->string('address', 255);
			$table->string('fixed_salary');
			$table->string('email')->nullable();
		});
	}

	public function down()
	{
		Schema::drop('receptionists');
	}
}