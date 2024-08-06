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

            $table->foreignId('doctor_id')->nullable()->references('id')->on('doctors');
            $table->string('phone',10);
            $table->string('gender');
            $table->integer('age_day')->nullable();
            $table->integer('age_month')->nullable();
            $table->integer('age_year')->nullable();
            $table->foreignIdFor(\App\Models\Company::class)->nullable()->constrained();
            $table->foreignIdFor(\App\Models\Subcompany::class)->nullable()->constrained();
            $table->foreignIdFor(\App\Models\CompanyRelation::class)->nullable()->constrained();
            $table->integer('paper_fees')->nullable();
            $table->string('guarantor')->nullable();
            $table->date('expire_date')->nullable();
            $table->string('insurance_no')->nullable();
            $table->boolean('is_lab_paid')->default(0);
            $table->integer('lab_paid')->default(0);
            $table->boolean('result_is_locked')->default(0);
            $table->boolean('sample_collected')->default(0);
            $table->time('sample_collect_time')->nullable();
            $table->dateTime('result_print_date')->nullable()->default(null);
            $table->dateTime('sample_print_date')->nullable()->default(null);
            $table->integer('visit_number');
            $table->boolean('result_auth');
            $table->dateTime('auth_date');

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
