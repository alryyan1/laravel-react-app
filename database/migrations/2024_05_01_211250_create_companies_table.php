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
        Schema::create('Companies', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->float('lab_endurance');
            $table->float('service_endurance');
            $table->boolean('status');
            $table->integer('lab_roof');
            $table->integer('service_roof');
            $table->string('phone');
            $table->string('email');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('insurance');
    }
};
