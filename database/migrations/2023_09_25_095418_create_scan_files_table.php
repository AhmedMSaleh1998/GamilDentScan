<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateScanFilesTable extends Migration {

	public function up()
	{
		Schema::create('scan_files', function(Blueprint $table) {
			$table->increments('id');
			$table->timestamps();
			$table->integer('scan_id')->unsigned();
			$table->string('file_name');
		});
	}

	public function down()
	{
		Schema::drop('scan_files');
	}
}