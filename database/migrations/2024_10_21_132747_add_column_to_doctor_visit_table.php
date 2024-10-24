<?php

use App\Models\Shift;
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
        Schema::table('doctor_visit', function (Blueprint $table) {
            $table->foreignIdFor(\App\Models\Shift::class);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('doctor_visit', function (Blueprint $table) {
            $table->dropForeign(Shift::class);
        });
    }
};
