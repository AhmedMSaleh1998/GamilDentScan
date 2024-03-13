<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateReceptionistsTable extends Migration {

	public function up()
	{
		Schema::create('receptionists', function(Blueprint $table) {
			$table->increments('id');
			$table->timestamps();
			$table->string('name', 255)->nullable();
			$table->string('phone')->nullable();
			$table->string('address')->nullable();
			$table->string('email')->nullable();
			$table->integer('fixed_salary')->nullable();
		});
	}

	public function down()
	{
		Schema::drop('receptionists');
	}
}