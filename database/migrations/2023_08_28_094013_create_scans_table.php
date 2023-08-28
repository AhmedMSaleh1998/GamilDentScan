<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateScansTable extends Migration {

	public function up()
	{
		Schema::create('scans', function(Blueprint $table) {
			$table->increments('id');
			$table->timestamps();
			$table->integer('patient_id')->unsigned();
			$table->integer('scan_type_id')->unsigned();
			$table->string('current_price');
			$table->tinyInteger('is_recieved')->default('0');
			$table->integer('dentist_id')->unsigned()->nullable();
			$table->integer('reciptionist_id')->unsigned();
			$table->integer('technician_id')->unsigned();
			$table->string('total_price_after_discount', 255);
			$table->string('paid_by_patient', 255);
			$table->tinyInteger('whatsapp_sent')->default('0');
			$table->integer('payment_method_id')->unsigned()->nullable();
			$table->string('file')->nullable();
			$table->string('dicom_file_link')->nullable();
			$table->string('current_reciptionist_commission');
			$table->string('current_technician_commission')->nullable();
			$table->datetime('reservation_time')->nullable();
			$table->string('working_on_time')->nullable();
			$table->datetime('delivery_time')->nullable();
			$table->datetime('reciving_time')->nullable();
			$table->datetime('recieved_time')->nullable();
			$table->string('reciever_name', 255)->nullable();
			$table->tinyInteger('status')->default('0');
			$table->string('discount_reason')->nullable();
		});
	}

	public function down()
	{
		Schema::drop('scans');
	}
}