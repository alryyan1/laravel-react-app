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
        Schema::create('doctor_services', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(\App\Models\Doctor::class)->constrained();
            $table->foreignIdFor(\App\Models\Service::class)->constrained();
            $table->unique(['doctor_id', 'service_id']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('doctor_services');
    }
};
