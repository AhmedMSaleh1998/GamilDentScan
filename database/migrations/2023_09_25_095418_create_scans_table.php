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
			$table->integer('dentist_id')->unsigned()->nullable();
			$table->integer('receptionist_id')->unsigned();
			$table->integer('technician_id')->unsigned()->nullable();
			$table->string('current_price')->nullable();
			$table->string('total_price_after_discount')->nullable();
			$table->string('paid_by_patient')->nullable();
			$table->string('current_receptionist_commission')->nullable();
			$table->string('current_technician_commission')->nullable();
			$table->tinyInteger('is_recived')->default('0');
			$table->tinyInteger('whatsapp_sent')->default('0');
			$table->string('dicom_file_link')->nullable();
			$table->datetime('reservation_time')->nullable();
			$table->integer('organization_id')->unsigned()->nullable();
			$table->string('discount_reason')->nullable();
			$table->tinyInteger('type')->nullable();
			$table->tinyInteger('status')->nullable();
			$table->datetime('confirmation_time')->nullable();
			$table->datetime('working_time')->nullable();
			$table->datetime('receipt_time')->nullable();
			$table->datetime('recevied_time');
			$table->string('recevier_name')->nullable();
		});
	}

	public function down()
	{
		Schema::drop('scans');
	}
}