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
			$table->integer('receptionist_commision');
			$table->integer('technicain_commision');
			$table->string('base_recieving_time');
			$table->integer('organization_id')->unsigned()->nullable();
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