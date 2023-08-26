<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateDentistsTable extends Migration {

	public function up()
	{
		Schema::create('dentists', function(Blueprint $table) {
			$table->increments('id');
			$table->timestamps();
			$table->softDeletes();
			$table->string('name', 255);
			$table->string('phone_one', 20)->nullable();
			$table->string('phone_two')->nullable();
			$table->string('address_one', 255)->nullable();
			$table->string('address_two')->nullable();
			$table->string('email_one')->nullable();
			$table->string('email_two')->nullable();
			$table->integer('district_id')->unsigned()->nullable();
		});
	}

	public function down()
	{
		Schema::drop('dentists');
	}
}