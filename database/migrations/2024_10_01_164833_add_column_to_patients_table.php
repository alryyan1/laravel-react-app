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
        Schema::table('patients', function (Blueprint $table) {
            $table->boolean('doctor_lab_request_confirm')->default(0);
            $table->boolean('doctor_lab_urgent_confirm')->default(0);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('patients', function (Blueprint $table) {
            $table->dropColumn('doctor_lab_request_confirm');
            $table->dropColumn('doctor_lab_urgent_confirm');
        });
    }
};
