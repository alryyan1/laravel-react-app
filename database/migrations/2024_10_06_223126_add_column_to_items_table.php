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
        Schema::table('items', function (Blueprint $table) {
            $table->string('active1')->default('');
            $table->string('active2')->default('');
            $table->string('active3')->default('');
            $table->string('pack_size')->default('');
            $table->double('approved_rp',10,3)->default(0);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('items', function (Blueprint $table) {
            $table->dropColumn('active1');
            $table->dropColumn('active2');
            $table->dropColumn('active3');
            $table->dropColumn('pack_size');
            $table->dropColumn('approved_rp');

        });
    }
};
