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
        Schema::create('items', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(\App\Models\Section::class)->nullable()->constrained()->cascadeOnUpdate()->nullOnDelete();
            $table->string('name');
            $table->integer('require_amount')->nullable()->default(0);
            $table->integer('initial_balance')->default(0);
            $table->integer('initial_price')->default(0);
            $table->integer('tests')->nullable()->default(0);
            $table->date('expire');
            $table->float('cost_price',8,3);
            $table->float('sell_price',8,3);
            $table->float('tax',8,3);
            $table->foreignIdFor(\App\Models\DrugCategory::class)->nullable()->constrained();
            $table->foreignIdFor(\App\Models\PharmacyType::class)->nullable()->constrained();
            $table->string('barcode')->nullable();
            $table->smallInteger('strips');
            $table->string('sc_name');
            $table->string('market_name');
            $table->string('batch')->nullable();
            $table->timestamps();
            $table->unique(['barcode']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('items');
    }
};
