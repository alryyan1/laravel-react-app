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
        Schema::create('payment_suppliers', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(\App\Models\Supplier::class)->constrained()->cascadeOnUpdate()->cascadeOnDelete();
            $table->double('amount',10,3);
            $table->foreignIdFor(\App\Models\User::class)->constrained()->cascadeOnUpdate()->cascadeOnDelete();
            $table->enum('type_of_payment',['cash','bank','visa','mobile_transfer'])->default('cash');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('payment_suppliers');
    }
};
