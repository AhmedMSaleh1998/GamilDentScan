<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Eloquent\Model;

class CreateForeignKeys extends Migration {

	public function up()
	{
		Schema::table('patient_scans', function(Blueprint $table) {
			$table->foreign('patient_id')->references('id')->on('patients')
						->onDelete('restrict')
						->onUpdate('restrict');
		});
		Schema::table('patient_scans', function(Blueprint $table) {
			$table->foreign('scan_id')->references('id')->on('scans')
						->onDelete('restrict')
						->onUpdate('restrict');
		});
		Schema::table('patient_scans', function(Blueprint $table) {
			$table->foreign('doctor_id')->references('id')->on('dentists')
						->onDelete('restrict')
						->onUpdate('restrict');
		});
		Schema::table('patient_scans', function(Blueprint $table) {
			$table->foreign('reciptionist_id')->references('id')->on('receptionists')
						->onDelete('restrict')
						->onUpdate('restrict');
		});
		Schema::table('patient_scans', function(Blueprint $table) {
			$table->foreign('technician_id')->references('id')->on('technicians')
						->onDelete('restrict')
						->onUpdate('restrict');
		});
		Schema::table('patient_scans', function(Blueprint $table) {
			$table->foreign('payment_method_id')->references('id')->on('payment_methods')
						->onDelete('restrict')
						->onUpdate('restrict');
		});
	}

	public function down()
	{
		Schema::table('patient_scans', function(Blueprint $table) {
			$table->dropForeign('patient_scans_patient_id_foreign');
		});
		Schema::table('patient_scans', function(Blueprint $table) {
			$table->dropForeign('patient_scans_scan_id_foreign');
		});
		Schema::table('patient_scans', function(Blueprint $table) {
			$table->dropForeign('patient_scans_doctor_id_foreign');
		});
		Schema::table('patient_scans', function(Blueprint $table) {
			$table->dropForeign('patient_scans_reciptionist_id_foreign');
		});
		Schema::table('patient_scans', function(Blueprint $table) {
			$table->dropForeign('patient_scans_technician_id_foreign');
		});
		Schema::table('patient_scans', function(Blueprint $table) {
			$table->dropForeign('patient_scans_payment_method_id_foreign');
		});
	}
}