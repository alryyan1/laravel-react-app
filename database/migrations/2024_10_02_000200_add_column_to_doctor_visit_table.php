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
        Schema::table('doctor_visit', function (Blueprint $table) {
            $table->boolean('is_new')->default(1);
            $table->integer('number');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('doctor_visit', function (Blueprint $table) {
            $table->dropColumn('is_new');
            $table->dropColumn('number');
        });
    }
};
