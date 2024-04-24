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
        Schema::create('deducted_items', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(\App\Models\Deduct::class)->constrained()->cascadeOnDelete();
            $table->foreignIdFor(\App\Models\Item::class)->constrained()->cascadeOnDelete()->cascadeOnUpdate();
            $table->foreignIdFor(\App\Models\Client::class)->constrained()->cascadeOnDelete()->cascadeOnUpdate();
            $table->integer('quantity');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('deducted_items');
    }
};
