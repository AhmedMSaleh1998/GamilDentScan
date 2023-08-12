<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateScansTable extends Migration {

	public function up()
	{
		Schema::create('scans', function(Blueprint $table) {
			$table->increments('id');
			$table->timestamps();
			$table->softDeletes();
			$table->string('name', 50);
			$table->string('price');
			$table->integer('commision');
			$table->string('base_recieving_time');
		});
	}

	public function down()
	{
		Schema::drop('scans');
	}
}