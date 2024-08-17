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
        Schema::create('doctor_visit', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(\App\Models\Patient::class)->constrained()->cascadeOnUpdate()->cascadeOnDelete();
            $table->foreignIdFor(\App\Models\DoctorShift::class)->constrained()->cascadeOnUpdate()->cascadeOnDelete();
            $table->timestamps();
            $table->unique(['patient_id','doctor_shift_id']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('doctor_visit');
    }
};
