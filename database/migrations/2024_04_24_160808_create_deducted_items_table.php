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

            $table->foreignIdFor(\App\Models\Shift::class)->constrained()->cascadeOnDelete();
            $table->foreignIdFor(\App\Models\User::class)->constrained();
            $table->foreignIdFor(\App\Models\Deduct::class)->constrained()->cascadeOnDelete();
            $table->foreignIdFor(\App\Models\Item::class)->constrained()->cascadeOnDelete()->cascadeOnUpdate();
            $table->foreignIdFor(\App\Models\Client::class)->nullable()->constrained()->cascadeOnDelete()->cascadeOnUpdate();
            $table->integer('strips')->nullable();
            $table->float('box');
            $table->float('price');
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
