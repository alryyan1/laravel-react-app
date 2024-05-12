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
        Schema::create('patients', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->foreignIdFor(\App\Models\Shift::class)->constrained()->cascadeOnDelete();
            $table->foreignIdFor(\App\Models\User::class)->constrained()->cascadeOnDelete();
            $table->foreignId('doctor_id')->references('id')->on('doctors');
            $table->string('phone',10);
            $table->string('gender');
            $table->integer('age_day')->nullable();
            $table->integer('age_month')->nullable();
            $table->integer('age_year')->nullable();
            $table->integer('company_id')->nullable();
            $table->integer('sub_company_id')->nullable();
            $table->string('family_member')->nullable();
            $table->integer('paper_fees')->nullable();
            $table->string('guarantor')->nullable();
            $table->date('expire_date')->nullable();
            $table->string('insurance_no')->nullable();
            $table->boolean('is_lab_paid')->default(0);
            $table->integer('lab_paid')->default(0);
            $table->integer('visit_number');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('patients');
    }
};
