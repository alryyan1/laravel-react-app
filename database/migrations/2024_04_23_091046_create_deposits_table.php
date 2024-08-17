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
        Schema::create('deposits', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(\App\Models\Supplier::class)->constrained()->cascadeOnUpdate();
            $table->string('bill_number');
            $table->date('bill_date');
            $table->boolean('complete')->default(0);
            $table->boolean('paid')->default(false);
            $table->foreignIdFor(\App\Models\User::class)->nullable();

            $table->timestamps();

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('deposits');
    }
};
