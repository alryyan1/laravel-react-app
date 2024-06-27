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
        Schema::create('denos_users', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(\App\Models\User::class);
            $table->foreignIdFor(\App\Models\Shift::class);
            $table->foreignIdFor(\App\Models\Deno::class);
            $table->integer('amount');
            $table->unique(['user_id', 'deno_id','shift_id']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('cash_tally_user');
    }
};
