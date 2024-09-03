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
        Schema::table('deducted_items', function (Blueprint $table) {
            $table->boolean('offer_applied')->default(false);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('deducted_items', function (Blueprint $table) {
            $table->dropColumn('offer_applied');
        });
    }
};
