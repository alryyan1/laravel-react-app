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
            $table->foreignId('doctor_id');
            $table->string('phone',10);
            $table->integer('company_id')->nullable();
            $table->integer('sub_company_id')->nullable();
            $table->string('family_member')->nullable();
            $table->integer('paper_fees')->nullable();
            $table->string('guarantor')->nullable();
            $table->date('expire_date')->nullable();
            $table->string('insurance_no');
            $table->integer('user_id');
            $table->integer('shift_id');
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
