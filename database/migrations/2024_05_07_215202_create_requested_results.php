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
        Schema::create('requested_results', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(\App\Models\LabRequest::class)->constrained('labrequests')->cascadeOnDelete();
            $table->foreignIdFor(\App\Models\Patient::class)->constrained()->cascadeOnDelete()->cascadeOnUpdate();
            $table->foreignIdFor(\App\Models\MainTest::class)->constrained()->cascadeOnDelete()->cascadeOnUpdate();
            $table->foreignIdFor(\App\Models\ChildTest::class);
            $table->text('result')->default('');
            $table->text('normal_range');
            $table->timestamps();
            $table->unique(['main_test_id','patient_id','child_test_id']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('requested_results');
    }
};
