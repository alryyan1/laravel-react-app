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
        Schema::create('deducts', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(\App\Models\Shift::class)->constrained();
            $table->foreignIdFor(\App\Models\User::class)->constrained();
            $table->foreignIdFor(\App\Models\PaymentType::class)->default(1)->constrained();
            $table->boolean('complete')->default(false);
//            $table->boolean('complete')->default(false);
            $table->float('total_amount_received')->default(false);
            $table->integer('number');
            $table->string('notes')->nullable();
            $table->boolean('is_sell')->nullable();
            $table->foreignIdFor(\App\Models\Client::class)->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('deducts');
    }
};
