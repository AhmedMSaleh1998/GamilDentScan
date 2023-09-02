<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateOrganizationsTable extends Migration {

	public function up()
	{
		Schema::create('organizations', function(Blueprint $table) {
			$table->increments('id');
			$table->timestamps();
			$table->softDeletes();
			$table->string('name')->nullable();
		});
	}

	public function down()
	{
		Schema::drop('organizations');
	}
}