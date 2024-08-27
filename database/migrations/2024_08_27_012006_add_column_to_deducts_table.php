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
        Schema::table('deducts', function (Blueprint $table) {
            $table->dateTime('money_received_at')->nullable();
            $table->foreignIdFor(\App\Models\ShippingState::class)->nullable()->constrained();

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('deducts', function (Blueprint $table) {
            $table->dropColumn('money_received_at');
            $table->dropColumn('shipping_state_id');

        });
    }
};
