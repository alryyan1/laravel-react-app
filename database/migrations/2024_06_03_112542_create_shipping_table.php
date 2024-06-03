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
        Schema::create('shippings', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(\App\Models\ShippingItem::class)->constrained();
            $table->string('name');
            $table->string('phone');
            $table->string('express');
            $table->string('ctn');
            $table->string('cbm');
            $table->string('kg');
            $table->foreignIdFor(\App\Models\ShippingState::class)->nullable()->constrained();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('shippings');
    }
};
