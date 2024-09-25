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
        Schema::table('requested_services', function (Blueprint $table) {
            $table->string('doctor_note')->default('');
            $table->string('nurse_note')->default('');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('requested_services', function (Blueprint $table) {
             $table->dropColumn('doctor_note');
             $table->dropColumn('nurse_note');
        });
    }
};
