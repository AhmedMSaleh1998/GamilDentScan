<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateScanTypesTable extends Migration {

	public function up()
	{
		Schema::create('scan_types', function(Blueprint $table) {
			$table->increments('id');
			$table->timestamps();
			$table->softDeletes();
			$table->string('name', 50);
			$table->string('price');
			$table->integer('receptionist_commision');
			$table->integer('technicain_commision');
			$table->string('base_recieving_time');
		});
	}

	public function down()
	{
		Schema::drop('scan_types');
	}
}