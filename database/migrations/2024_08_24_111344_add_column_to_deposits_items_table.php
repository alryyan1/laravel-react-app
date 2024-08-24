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
        Schema::table('deposit_items', function (Blueprint $table) {
            //ماتنسي تضيف الديسمال بوينتس لي لعمود سعر التكلفه
            $table->renameColumn('price','cost');
            $table->double('sell_price',10,3);
            $table->double('vat_cost',10,3);
            $table->double('vat_sell',10,3);
            $table->integer('free_quantity');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('deposit_items', function (Blueprint $table) {
            $table->dropColumn('cost');
            $table->dropColumn('sell_price');
            $table->dropColumn('vat');
            $table->dropColumn('free_quantity');
        });
    }
};
