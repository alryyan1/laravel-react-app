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
            $table->boolean('is_postpaid')->default(false);
            $table->boolean('postpaid_complete')->default(false);
            $table->dateTime('postpaid_date')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('deducts', function (Blueprint $table) {
            $table->dropColumn('is_postpaid');
            $table->dropColumn('postpaid_complete');
            $table->dropColumn('postpaid_date');
        });
    }
};
