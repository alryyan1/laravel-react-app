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
        Schema::create('finance_entries', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(\App\Models\FinanceAccount::class,'from_account')->nullable()->constrained()->references('id')->on('finance_accounts');
            $table->foreignIdFor(\App\Models\FinanceAccount::class,'to_account')->nullable()->constrained()->references('id')->on('finance_accounts');
            $table->text('description');
            $table->float('amount');
            $table->boolean('transfer');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('finance_entries');

    }
};
