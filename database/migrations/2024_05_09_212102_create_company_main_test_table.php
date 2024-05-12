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
        Schema::create('company_main_test', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(\App\Models\MainTest::class)->constrained()->cascadeOnDelete()->cascadeOnUpdate();
            $table->foreignIdFor(\App\Models\Company::class)->constrained()->cascadeOnDelete()->cascadeOnUpdate();
            $table->boolean('status');
            $table->float('price');
            $table->boolean('approve');
            $table->integer('endurance_static');
            $table->float('endurance_percentage');
            $table->unique(['main_test_id','company_id']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('company_main_test');
    }
};
