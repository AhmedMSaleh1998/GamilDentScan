<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreatePatientScansTable extends Migration {

	public function up()
	{
		Schema::create('patient_scans', function(Blueprint $table) {
			$table->increments('id');
			$table->timestamps();
			$table->softDeletes();
			$table->integer('patient_id')->unsigned();
			$table->integer('scan_id')->unsigned();
			$table->string('current_price');
			$table->string('current_discount', 25)->nullable();
			$table->tinyInteger('is_recieved')->default('0');
			$table->datetime('recieve_time')->nullable();
			$table->string('reciever_name', 255)->nullable();
			$table->integer('doctor_id')->unsigned()->nullable();
			$table->integer('reciptionist_id')->unsigned();
			$table->integer('technician_id')->unsigned();
			$table->string('total_price_after_discount', 255);
			$table->string('paid_by_patient', 255);
			$table->tinyInteger('whatsapp_sent')->default('0');
			$table->integer('payment_method_id')->unsigned();
			$table->string('file')->nullable();
			$table->string('dicom_file_link')->nullable();
		});
	}

	public function down()
	{
		Schema::drop('patient_scans');
	}
}