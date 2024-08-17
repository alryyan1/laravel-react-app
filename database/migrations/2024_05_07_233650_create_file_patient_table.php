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
        Schema::create('file_patient', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(\App\Models\File::class)->constrained()->cascadeOnUpdate()->cascadeOnDelete();
            $table->foreignIdFor(\App\Models\Patient::class)->constrained()->cascadeOnUpdate()->cascadeOnDelete();
            $table->unique(['patient_id','file_id']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('file_patient');
    }
};
