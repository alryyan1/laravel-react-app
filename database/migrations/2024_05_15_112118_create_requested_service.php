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
        Schema::create('requested_service', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(\App\Models\Patient::class)->constrained()->cascadeOnDelete()->cascadeOnDelete();
            $table->foreignIdFor(\App\Models\Service::class)->constrained()->cascadeOnDelete()->cascadeOnDelete();
            $table->foreignIdFor(\App\Models\User::class)->constrained()->cascadeOnDelete()->cascadeOnDelete();
            $table->foreignIdFor(\App\Models\Doctor::class)->constrained()->cascadeOnDelete()->cascadeOnDelete();
            $table->float('price');
            $table->float('amount_paid');
            $table->float('endurance');
            $table->boolean('is_paid');
            $table->integer('discount');
            $table->boolean('bank');
            $table->integer('count');
            $table->timestamps();
            $table->unique(['patient_id','service_id']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('requested_service');
    }
};