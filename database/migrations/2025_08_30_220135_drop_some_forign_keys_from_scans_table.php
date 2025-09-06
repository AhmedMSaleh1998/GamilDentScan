<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('scans', function (Blueprint $table) {
            $table->dropForeign(['receptionist_id']);
            $table->dropForeign(['technician_id']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('scans', function (Blueprint $table) {
            $table->foreign('receptionist_id')->references('id')->on('receptionists')->restrictOnDelete()->restrictOnUpdate();
            $table->foreign('technician_id')->references('id')->on('technicians')->restrictOnDelete()->restrictOnUpdate();
        });
    }
};
