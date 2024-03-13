<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Eloquent\Model;

class CreateForeignKeys extends Migration {

	public function up()
	{
		Schema::table('dentists', function(Blueprint $table) {
			$table->foreign('district_id')->references('id')->on('districts')
						->onDelete('restrict')
						->onUpdate('restrict');
		});
		Schema::table('scan_types', function(Blueprint $table) {
			$table->foreign('organization_id')->references('id')->on('organizations')
						->onDelete('cascade')
						->onUpdate('cascade');
		});
		Schema::table('scans', function(Blueprint $table) {
			$table->foreign('patient_id')->references('id')->on('patients')
						->onDelete('cascade')
						->onUpdate('cascade');
		});
		Schema::table('scans', function(Blueprint $table) {
			$table->foreign('scan_type_id')->references('id')->on('scan_types')
						->onDelete('restrict')
						->onUpdate('restrict');
		});
		Schema::table('scans', function(Blueprint $table) {
			$table->foreign('dentist_id')->references('id')->on('dentists')
						->onDelete('restrict')
						->onUpdate('restrict');
		});
		Schema::table('scans', function(Blueprint $table) {
			$table->foreign('receptionist_id')->references('id')->on('receptionists')
						->onDelete('restrict')
						->onUpdate('restrict');
		});
		Schema::table('scans', function(Blueprint $table) {
			$table->foreign('technician_id')->references('id')->on('technicians')
						->onDelete('restrict')
						->onUpdate('restrict');
		});
		Schema::table('scans', function(Blueprint $table) {
			$table->foreign('organization_id')->references('id')->on('organizations')
						->onDelete('restrict')
						->onUpdate('restrict');
		});
		Schema::table('scan_files', function(Blueprint $table) {
			$table->foreign('scan_id')->references('id')->on('scans')
						->onDelete('restrict')
						->onUpdate('restrict');
		});
	}

	public function down()
	{
		Schema::table('dentists', function(Blueprint $table) {
			$table->dropForeign('dentists_district_id_foreign');
		});
		Schema::table('scan_types', function(Blueprint $table) {
			$table->dropForeign('scan_types_organization_id_foreign');
		});
		Schema::table('scans', function(Blueprint $table) {
			$table->dropForeign('scans_patient_id_foreign');
		});
		Schema::table('scans', function(Blueprint $table) {
			$table->dropForeign('scans_scan_type_id_foreign');
		});
		Schema::table('scans', function(Blueprint $table) {
			$table->dropForeign('scans_dentist_id_foreign');
		});
		Schema::table('scans', function(Blueprint $table) {
			$table->dropForeign('scans_receptionist_id_foreign');
		});
		Schema::table('scans', function(Blueprint $table) {
			$table->dropForeign('scans_technician_id_foreign');
		});
		Schema::table('scans', function(Blueprint $table) {
			$table->dropForeign('scans_organization_id_foreign');
		});
		Schema::table('scan_files', function(Blueprint $table) {
			$table->dropForeign('scan_files_scan_id_foreign');
		});
	}
}