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
        Schema::create('drugs_prescribed', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(\App\Models\Patient::class)->constrained();
            $table->foreignIdFor(\App\Models\Doctor::class)->constrained();
            $table->foreignIdFor(\App\Models\Item::class)->constrained();
            $table->string('course');
            $table->string('days');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('drugs_prescribed');
    }
};
