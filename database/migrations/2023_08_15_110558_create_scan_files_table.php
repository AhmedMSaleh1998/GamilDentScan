<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateScanFilesTable extends Migration {

	public function up()
	{
		Schema::create('scan_files', function(Blueprint $table) {
			$table->increments('id');
			$table->integer('scan_id')->unsigned();
			$table->string('file_name');
			$table->timestamps();
		});
	}

	public function down()
	{
		Schema::drop('scan_files');
	}
}