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
        Schema::create('credit_entries', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(\App\Models\FinanceAccount::class)->constrained();
            $table->foreignIdFor(\App\Models\FinanceEntry::class)->constrained();
            $table->double('amount',10,3);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('credit_entries');
    }
};
