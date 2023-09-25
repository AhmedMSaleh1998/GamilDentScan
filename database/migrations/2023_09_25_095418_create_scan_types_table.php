<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateScanTypesTable extends Migration {

	public function up()
	{
		Schema::create('scan_types', function(Blueprint $table) {
			$table->increments('id');
			$table->timestamps();
			$table->string('name')->nullable();
			$table->integer('receptionist_commision')->nullable();
			$table->integer('technician_commision')->nullable();
			$table->string('base_recieving_time')->nullable();
			$table->integer('organization_id')->unsigned();
			$table->string('whatsapp_price')->nullable();
			$table->string('dvd_price')->nullable();
			$table->string('report_price')->nullable();
		});
	}

	public function down()
	{
		Schema::drop('scan_types');
	}
}