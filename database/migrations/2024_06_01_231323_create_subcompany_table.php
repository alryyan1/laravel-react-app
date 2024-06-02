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
        Schema::create('sub_companies', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->float('lab_endurance');
            $table->float('service_endurance');
            $table->foreignIdFor(\App\Models\Company::class);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('sub_companies');
    }
};
